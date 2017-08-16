/**
 * 
 */
package com.grlab.android.project.screen;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.SharedPreferences;
import android.graphics.Bitmap;
import android.net.Uri;
import android.os.Bundle;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.Toast;

import com.grlab.android.project.R;
import com.grlab.android.project.constant.KeyInfo;

/**
 * @(#)FacebookAuth.java
 * @ Copyright 2011 GRLab Corporation. All rights reserved.
 * 
 * @since        : 2011. 5. 21.
 * @author       : kim.sh
 */
public class FacebookAuth extends Activity {

	/**
	 * 페이스북 어플리케이션ID
	 */
	private static final String INFO_APP_ID = "190025697691091";
	/**
	 * 페이스북 어플리케이션 시크릿
	 */
	private static final String INFO_APP_SECRET = "e99d6d29572b963db17988b1c1761bea";
	/**
	 * 페이스북 인증키 취득 리다이렉트 URL
	 */
	private static final String URL_REDIRECT = "http://apps.facebook.com/grlabproject/";
	
	/**
	 * 프로그레스 다이얼로그
	 */
	private ProgressDialog pd;

	/* (non-Javadoc)
	 * @see android.app.Activity#onCreate(android.os.Bundle)
	 */
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.screen_facebook_auth);
		WebView webView = (WebView) findViewById(R.id.webView);
		webView.setWebViewClient(new FaceBookAuthWebViewClient());
		webView.getSettings().setJavaScriptEnabled(true);
		// 페이스북 인증 페이지 URL 생성
		StringBuilder sb = new StringBuilder();
		sb.append("https://graph.facebook.com/oauth/authorize?");
		sb.append("scope=publish_stream,offline_access&display=touch");
		// 어플리케이션 ID
		sb.append("&client_id=");
		sb.append(INFO_APP_ID);
		// 리다이렉트URI
		sb.append("&redirect_uri=");
		sb.append(URL_REDIRECT);
		webView.loadUrl(sb.toString());
	}

	/**
	 * SNS 인증 웹클라이언트
	 * 
	 * @since        : 2011. 5. 21.
	 * @author       : kim.sh
	 */
	private class FaceBookAuthWebViewClient extends WebViewClient {

		public FaceBookAuthWebViewClient() {
			pd = new ProgressDialog(FacebookAuth.this);
			pd.setProgressStyle(ProgressDialog.STYLE_SPINNER);
			pd.setMessage(getString(R.string.please_wait));
		}

		@Override
		public void onPageStarted(WebView view, String url, Bitmap favicon) {
			// 프로그레스 다이얼로그 표시
			if (!pd.isShowing()) {
				pd.show();
			}
			// URL이 파라메터로 설정했던 리다이렉트URI일 경우
			if (url.startsWith("http://apps.facebook.com/grlabproject/")) {
				Uri uri = Uri.parse(url);
				// 인증코드를 취득한다.
				String code = uri.getQueryParameter("code");
				// 인증코드로 인증키(token)을 취득한다.
				String accessToken = getAccessToken(code);

				if (accessToken != null && accessToken.length() > 0) {
					// 취득한 인증키(token)을 SharedPreferences에 저장한다.
					SharedPreferences sharedPreferences = 
						getSharedPreferences(KeyInfo.SP_NAME_FACEBOOK_INFO, MODE_PRIVATE);
					SharedPreferences.Editor prefEditor = sharedPreferences.edit();
					prefEditor.putString(KeyInfo.SP_KEY_FACEBOOK_ACCESS_TOKEN,accessToken);
					prefEditor.commit();
					
					onBackPressed();
					
					Toast.makeText(FacebookAuth.this, 
							R.string.sns_auth_sucess, Toast.LENGTH_SHORT).show();
				} else {
					Toast.makeText(FacebookAuth.this, 
							R.string.sns_auth_fail, Toast.LENGTH_SHORT).show();
				}
			} else {
				super.onPageStarted(view, url, favicon);
			}
		}

		@Override
		public boolean shouldOverrideUrlLoading(WebView view, String url) {
			return super.shouldOverrideUrlLoading(view, url);
		}

		@Override
		public void onPageFinished(WebView view, String url) {
			// 프로그레스 다이얼로그 비표시
			if (pd.isShowing()) {
				pd.dismiss();
			}
			super.onPageFinished(view, url);
		}
		
		/**
		 * 인증토큰 취득
		 * @param code 인증코드
		 * @return
		 */
		public String getAccessToken(String code) {
			String accessToken = null;
			// 페이스북 인증 페이지 URL 생성
			StringBuilder sb = new StringBuilder();
			sb.append("https://graph.facebook.com/oauth/access_token?");
			// 어플리케이션 ID
			sb.append("client_id=");
			sb.append(INFO_APP_ID);
			// 어플리케이션 시크릿
			sb.append("&client_secret=");
			sb.append(INFO_APP_SECRET);
			// 인증코드
			sb.append("&code=");
			sb.append(code);
			// 리다이렉트URI
			sb.append("&redirect_uri=");
			sb.append(URL_REDIRECT);
			try {
				// 생성한 인증페이지 URL로 커넥션 오픈
				URL url = new URL(sb.toString());
				HttpURLConnection connection =
					(HttpURLConnection) url.openConnection();

				BufferedReader input = new BufferedReader(
						new InputStreamReader(connection.getInputStream()));
				String line = "";
				while ((line = input.readLine()) != null) {
					
					// 결과행 중에  "access_token" 문자열을 포함할 경우,
					// "=" 와 "&" 사이에 있는 문자열(인증키)를 취득한다.
					if (line.contains("access_token")) {
						if (line.contains("&")) {
							accessToken = line.substring(line.indexOf("=") + 1,
									line.indexOf("&"));
						} else {
							accessToken = line.substring(line.indexOf("=") + 1,
									line.length());
						}
					}
				}
			} catch (MalformedURLException e1) {
				e1.printStackTrace();
			} catch (IOException e) {
				e.printStackTrace();
			}
			return accessToken;
		}
	}

	@Override
	protected void onDestroy() {
		if (pd.isShowing()) {
			pd.dismiss();
		}
		super.onDestroy();
	}
}
