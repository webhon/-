
package com.grlab.android.project.util;

import java.io.BufferedReader;
import java.io.File;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.List;

import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.entity.mime.MultipartEntity;
import org.apache.http.entity.mime.content.ContentBody;
import org.apache.http.entity.mime.content.FileBody;
import org.apache.http.entity.mime.content.StringBody;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONException;
import org.json.JSONObject;



/**
 * 페이스북 컨트롤러
 * 
 * @(#)FacebookController.java
 * @ Copyright 2011 GRLab Corporation. All rights reserved.
 * 
 * @since        : 2011. 6. 21.
 * @author       : kim.sh
 */
public class FacebookController {
	
	/**
	 * 담벼락에 글적기 URL
	 */
	public static final String URL_STATUS_MESSAGE = "https://graph.facebook.com/%1$s/feed";
	/**
	 * 그림 업로드 URL
	 */
	public static final String URL_PHOTO = "https://graph.facebook.com/%1$s/photos";
	/**
	 * 유저ID(분류)
	 */
	public static final String USER_ID = "me";
	/**
	 * 상태(결과)코드 키
	 */
	public static final String STATUS_CODE = "statusCode";
	/**
	 * 상태(결과)코드(OK)
	 */
	public static final int STATUS_CODE_OK = 0;
	/**
	 * 상태(결과)코드(UNAUTHORIZED)
	 */
	public static final int STATUS_CODE_UNAUTHORIZED = 401;
	/**
	 * 상태(결과)코드(FOBIDDEN)
	 */
	public static final int STATUS_CODE_FOBIDDEN = 403;
	/**
	 * 상태(결과)코드(ERROR_ETC)
	 */
	public static final int STATUS_CODE_ERROR_ETC = -100;
	/**
	 * 상태(결과)메시지  키
	 */
	public static final String STATUS_MESSAGE = "statusMessage";
	/**
	 * 상태(결과)메시지 (OK)
	 */
	public static final String STATUS_MESSAGE_OK = "페이스북에 성공적으로 반영되었습니다."; 
	/**
	 * 상태(결과)메시지 (UNAUTHORIZED)
	 */
	public static final String STATUS_MESSAGE_UNAUTHORIZED = "등록된 페이스북 계정이 없습니다. 계정을 등록합니다."; 
	/**
	 * 상태(결과)메시지 (FOBIDDEN)
	 */
	public static final String STATUS_MESSAGE_FOBIDDEN = "동일한 내용을 중복으로 작성 할 수 없습니다."; 
	/**
	 * 상태(결과)메시지 (ERROR_ETC)
	 */
	public static final String STATUS_MESSAGE_ERROR_ETC = "죄송합니다. 네트워크 장애 및 계정 이상의 이유로 실패하였습니다."; 
	/**
	 * 파라메터키(ACCESS_TOKEN)
	 */
	private static final String PARAM_KEY_ACCESS_TOKEN = "access_token";
	/**
	 * 파라메터키(MESSAGE)
	 */
	private static final String PARAM_KEY_MESSAGE = "message";
	/**
	 * 파라메터키(SOURCE)
	 */
	private static final String PARAM_KEY_SOURCE = "source";
	
	/**
	 * 담벼락에 글적기 
	 * @param message 메시지
	 * @param accessToken 인증토큰
	 * @return JSONObject 결과
	 */
	public static JSONObject uploadMessage(String message, String accessToken) {
		JSONObject jsonObj = null;
		// HttpClient 생성
		HttpClient httpclient = new DefaultHttpClient();
		// 요청 URL을 인자로 HttpPost 생성
		HttpPost httppost = new HttpPost(String.format(URL_STATUS_MESSAGE, USER_ID));
		// NameValuePair타입의  리스트 생성(파라메터 리스트)
		List<NameValuePair> list = new ArrayList<NameValuePair>();
		list.add(new BasicNameValuePair(PARAM_KEY_ACCESS_TOKEN, accessToken));
		list.add(new BasicNameValuePair(PARAM_KEY_MESSAGE, message));
		try {
			// 파라메터 리스트를 UTF-8형식으로 변환하여 UrlEncodedFormEntity로 반환
			UrlEncodedFormEntity entity = new UrlEncodedFormEntity(list, "UTF-8");
			// HttpPost의 Entity로 지정
			httppost.setEntity(entity);
			// 응답객체를 요청
			HttpResponse response = httpclient.execute(httppost);
			// 응답객체를 보조 스트림 객체로 싸서 변환
			BufferedReader input = new BufferedReader(new InputStreamReader(response.getEntity().getContent()));
			String line = "";
			String responseResult = "";
	        // 행 단위로 스트림을 읽어들인 결과값을 문자열로 연결시킴
			while ((line = input.readLine()) != null) {
	        	responseResult = responseResult + line;
	        }
			// 연결한 결과값 문자열을 분석하여 JSONObject로 변환
	        jsonObj = createJsonResult(responseResult);
			
		} catch (Exception e) {
			jsonObj =  createJsonResult(null);
			e.printStackTrace();
		} 
		
		return jsonObj;
	}
	
	/**
	 * 사진 업로드
	 * @param message 메시지
	 * @param imageFile 이미지파일
	 * @param accessToken 인증토큰
	 * @return JSONObject 결과
	 */
	public static JSONObject uploadMessageWithPhoto (String message, File imageFile, String accessToken) {
		JSONObject jsonObj = null;
		// HttpClient 생성
		HttpClient httpclient = new DefaultHttpClient();
		// 요청 URL을 인자로 HttpPost 생성
		HttpPost httppost = new HttpPost(String.format(URL_PHOTO, USER_ID));
		// 파일 전송을 위한 MultipartEntity를 생성
		MultipartEntity entity = new MultipartEntity();
		
		try {
			// 문자열인 인증키와 메시지는 StringBody객체로 생성
			ContentBody accessTokenBody = new StringBody(accessToken);
			ContentBody messageBody = new StringBody(message);
			// 이미지 파일은 FileBody객체로 생성
			ContentBody fileBody = new FileBody(imageFile);
			// 생성한 ContentBody를 MultipartEntity객체에 추가
			entity.addPart(PARAM_KEY_ACCESS_TOKEN, accessTokenBody);
			entity.addPart(PARAM_KEY_MESSAGE, messageBody);
			entity.addPart(PARAM_KEY_SOURCE, fileBody);
			// HttpPost의 Entity로 지정
			httppost.setEntity(entity);
			// 응답객체를 요청
			HttpResponse response = httpclient.execute(httppost);
			// 응답객체를 보조 스트림 객체로 싸서 변환
			BufferedReader input = new BufferedReader(new InputStreamReader(response.getEntity().getContent()));
			
			String line = "";
			String responseResult = "";
	        // 행 단위로 스트림을 읽어들인 결과값을 문자열로 연결시킴
	        while ((line = input.readLine()) != null) {
	        	responseResult = responseResult + line;
	        }
			// 연결한 결과값 문자열을 분석하여 JSONObject로 변환
	        jsonObj = createJsonResult(responseResult);
			
		} catch (Exception e) {
			jsonObj =  createJsonResult(null);
			e.printStackTrace();
		} 
		return jsonObj;
	}
	
	
	/**
	 * 업로드/글적기 결과 JSON 정보 생성
	 * @param message 업로드/글적기 결과
	 * @return JSONObject
	 */
	private static JSONObject createJsonResult(String message) {
		JSONObject result = new JSONObject();
		try {
			if (message != null && !"".equals(message)) {
				// 결과값 문자열을 JSONObject객체로 변환
				JSONObject response = new JSONObject(message);
				// JSONObject객체에서  "id" key값으로 취득한 문자열의 길이가 0이상일 경우, 
				// 정상 결과로 판단
				String resultId = response.getString("id");
				if (resultId.length() > 0) {
					// 페이스북 정상등록 결과 설정
					result.put(STATUS_CODE, STATUS_CODE_OK);
					result.put(STATUS_MESSAGE, STATUS_MESSAGE_OK);
				} else {
					// JSONObject객체에서  "error"를 key값으로 error정보를 담고 있는
					// JSONObject errorJson을 취득
					JSONObject errorJson = response.getJSONObject("error");
					// errorJson으로 부터 "message"를 key값으로 에러 메시지를 취득
					String errorMessage = errorJson.getString("message");
					// 에러 메시지가 "access" or "OAuth" or "token" or "code" 를 포함하고 
					// 있을 경우, 
					if (errorMessage.contains("access") || errorMessage.contains("OAuth")
							|| errorMessage.contains("token") || errorMessage.contains("code")) {
						// code 또는 AccessToken 상태 이상 으로 판단, 페이스북 비정상등록 결과 설정
						result.put(STATUS_CODE, STATUS_CODE_UNAUTHORIZED);
						result.put(STATUS_MESSAGE, STATUS_MESSAGE_UNAUTHORIZED);
			
					// 에러 메시지가 "506" or "Duplicate" 를 포함하고 
					// 있을 경우, 페이스북 비정상등록 결과 설정
					} else if (errorMessage.contains("506") || errorMessage.contains("Duplicate")) {
						// 중복 작성으로 판단, 
						result.put(STATUS_CODE, STATUS_CODE_FOBIDDEN);
						result.put(STATUS_MESSAGE, STATUS_MESSAGE_FOBIDDEN);
					} else {
						// 그외 에러 설정
						result.put(STATUS_CODE, STATUS_CODE_ERROR_ETC);
						result.put(STATUS_MESSAGE, STATUS_MESSAGE_ERROR_ETC);
					}
				} 
			} else {
				// 그외 에러 설정
				result.put(STATUS_CODE, STATUS_CODE_ERROR_ETC);
				result.put(STATUS_MESSAGE, STATUS_MESSAGE_ERROR_ETC);
			}
		} catch (JSONException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return result;
	}
}
