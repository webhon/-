package com.grlab.android.project.util;

import java.io.IOException;
import java.io.InputStream;
import java.io.UnsupportedEncodingException;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLEncoder;
import java.util.ArrayList;
import java.util.HashMap;

import org.xmlpull.v1.XmlPullParser;
import org.xmlpull.v1.XmlPullParserException;
import org.xmlpull.v1.XmlPullParserFactory;

import android.text.Html;
import android.text.Spanned;

/**
 * 네이버 파서
 * 
 * @(#)NaverParser.java
 * @ Copyright 2011 GRLab Corporation. All rights reserved.
 * 
 * @since        : 2011. 6. 21.
 * @author       : kim.sh
 */
public class NaverParser {

	/**
	 * 네이버 검색결과 리스트 취득
	 * @param searchTxt 검색어
	 * @param apiTarget AIP타겟(카테고리)
	 * @param displayCount 표시개수
	 * @param start 시작인덱스
	 * @return
	 */
	public static ArrayList<HashMap<String, String>> getNaverSearchResultList(
			String searchTxt, String apiTarget, int displayCount, int start) {

		try {
			// 검색어를 UTF8로 인코딩한다.
			searchTxt = URLEncoder.encode(searchTxt, "UTF-8");
		} catch (UnsupportedEncodingException e1) {
			e1.printStackTrace();
		}
		// 파라메터를 포함한 URL을 생성하여 응답받은 결과 값을 XmlPullParser 형식으로 취득
		XmlPullParser parser = getParser(createURL(searchTxt, apiTarget,
				displayCount, start));
		// 결과 리스트 생성
		ArrayList<HashMap<String, String>> responseFieldList = new ArrayList<HashMap<String, String>>();
		HashMap<String, String> responseField = new HashMap<String, String>();
		try {
			// 파서의 이벤트 타입을 취득
			int parseEvent = parser.getEventType();
			// 이벤트 타입이 XmlPullParser.END_DOCUMENT이 될 때까지 반복하여 엘리먼트를 읽어들인다.
			while (parseEvent != XmlPullParser.END_DOCUMENT) {
				// XmlPullParser.START_TAG일 경우, ('<>')
				if (parseEvent == XmlPullParser.START_TAG) {
					// 엘리먼트 명칭을 취득한 후, 엘리먼트 명칭과 속성 값을 <key-value>로 Map에 추가한다.
					String tag = parser.getName();
					if ("item".equals(tag)) {
						// 엘리먼트가 "item"일 경우, 한 검색결과 한 항목이 시작하는 지점이기 때문에
						// Map을 생성한다.
						responseField = new HashMap<String, String>();
					} else if ("title".equals(tag)) {
						responseField.put("title", convertStringToHtml(
								parser.nextText()).toString());
					} else if ("link".equals(tag)) {
						responseField.put("link", parser.nextText());
					} else if ("description".equals(tag)) {
						responseField.put("description", convertStringToHtml(
								parser.nextText()).toString());
					} else if ("total".equals(tag)) {
						responseField.put("total", parser.nextText());
						// 엘리먼트가 "total"일 경우, 리스트의 첫번째 인덱스에
						// "total"의 값만 가지는 Map을 추가한다.
						responseFieldList.add(responseField);
					}
					// XmlPullParser.END_TAG일 경우, ('</>')
				} else if (parseEvent == XmlPullParser.END_TAG) {
					String tag = parser.getName();
					if ("item".equals(tag)) {
						// 엘리먼트가 "item"일 경우, 한 검색결과 한 항목이 끝나는 지점이기 때문에
						// Map을 리스트에 추가한다.
						responseFieldList.add(responseField);
					}
				}
				// 다음 엘리먼트를 읽어들인다.
				parseEvent = parser.next();
			}
		} catch (XmlPullParserException e) {
			e.printStackTrace();
		} catch (IOException e) {
			e.printStackTrace();
		}
		return responseFieldList;
	}

	/**
	 * XMLPullParser 취득
	 * @param url 검색 API URL
	 * @return XmlPullParser
	 */
	private static XmlPullParser getParser(String url) {
		XmlPullParser parser = null;
		try {
			// XmlPullParser를 취득
			XmlPullParserFactory parserCreator = XmlPullParserFactory
					.newInstance();
			parser = parserCreator.newPullParser();
			// URL의 스트림을 열어 파서에 설정한다.
			InputStream is = new URL(url).openStream();
			parser.setInput(is, null);
		} catch (MalformedURLException e) {
			e.printStackTrace();
		} catch (XmlPullParserException e) {
			e.printStackTrace();
		} catch (IOException e) {
			e.printStackTrace();
		}
		return parser;

	}

	/**
	 * 검색 API URL 생성
	 * @param searchTxt 검색어
	 * @param apiTarget AIP타겟(카테고리)
	 * @param displayCount 표시개수
	 * @param start 시작인덱스
	 * @return String URL
	 */
	private static String createURL(String searchTxt, String apiTarget,
			int displayCount, int start) {
		StringBuilder sb = new StringBuilder();
		// 네이버 검색 API URL
		sb.append("http://openapi.naver.com/search");
		// 네이버 API KEY (각자 받아서 사용하길 바란다.)
		sb.append("?key=");
		sb.append("64d985e5eb794d8c60d8bd9086b27876");
		// 검색어
		sb.append("&query=");
		sb.append(searchTxt);
		// 화면에 표시할 개수
		sb.append("&display=");
		sb.append(displayCount);
		// 시작index
		sb.append("&start=");
		sb.append(start);
		// 검색 타겟
		sb.append("&target=");
		sb.append(apiTarget);
		// 소팅 방법
		sb.append("&sort=sim");
		return sb.toString();
	}

	/**
	 * HTML 문자열을 Spanned 문자열로 변환
	 * @param str HTML 문자열
	 * @return Spanned
	 */
	private static Spanned convertStringToHtml(String str) {
		return Html.fromHtml(str);
	}
}
