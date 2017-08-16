/**
 * 
 */
package com.grlab.android.project.screen;


import android.app.Activity;
import android.app.ProgressDialog;
import android.graphics.Bitmap;
import android.os.Bundle;
import android.webkit.WebView;
import android.webkit.WebViewClient;

import com.grlab.android.project.R;
import com.grlab.android.project.constant.KeyInfo;

/**
 * 네이버 검색결과 상세 화면
 * 
 * @(#)NaverDetail.java
 * @ Copyright 2011 GRLab Corporation. All rights reserved.
 * 
 * @since        : 2011. 6. 6.
 * @author       : kim.sh
 */
public class NaverDetail extends Activity {

	/**
	 * 웹뷰
	 */
	private WebView webView;
	/**
	 * 프로그레스 다이얼로그
	 */
	public ProgressDialog pd;

	/* (non-Javadoc)
	 * @see android.app.Activity#onCreate(android.os.Bundle)
	 */
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.screen_naver_detail);
		
		Bundle bundle = getIntent().getExtras();
		String url = bundle.getString(KeyInfo.BUNDLE_KEY_NAVER_URL);
		
		webView = (WebView)findViewById(R.id.webView);
		webView.setWebViewClient(new NaverWebViewClient());
		webView.getSettings().setJavaScriptEnabled(true);
		webView.getSettings().setSupportZoom(true);
		webView.getSettings().setBuiltInZoomControls(true) ;
        
		webView.setHorizontalScrollBarEnabled(true) ;
		webView.setHorizontalScrollbarOverlay(true) ;
		webView.setVerticalScrollBarEnabled(true) ;
		webView.setVerticalScrollbarOverlay(true) ;
		webView.setScrollbarFadingEnabled(true) ;
		webView.setInitialScale(100) ;
		
		webView.getSettings().setJavaScriptEnabled(true);
		webView.loadUrl(url);
	}

	/**
	 * 네이버 검색결과 상세 웹뷰 클라이언트
	 * 
	 * @since        : 2011. 6. 6.
	 * @author       : kim.sh
	 */
	private class NaverWebViewClient extends WebViewClient {

		public NaverWebViewClient() {
			pd = new ProgressDialog(NaverDetail.this);
			pd.setProgressStyle(ProgressDialog.STYLE_SPINNER);
			pd.setMessage(getString(R.string.please_wait));
		}

		@Override
		public void onPageStarted(WebView view, String url, Bitmap favicon) {
			super.onPageStarted(view, url, favicon);
			if (!pd.isShowing()) {
				pd.show();
			}
		}

		@Override
        public boolean shouldOverrideUrlLoading(WebView view, String url) {
            return false;
        }

		@Override
		public void onPageFinished(WebView view, String url) {
			super.onPageFinished(view, url);
			if (pd.isShowing()) {
				pd.dismiss();
			}
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
