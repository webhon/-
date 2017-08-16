/**
 * 
 */
package com.grlab.android.project.screen;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.URL;
import java.net.URLEncoder;

import android.app.Activity;
import android.app.AlertDialog;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.EditText;

import com.grlab.android.project.R;
import com.grlab.android.project.constant.KeyInfo;

/**
 * C2DM메시지 발신 화면
 * 
 * @(#)C2DMMessage.java
 * @ Copyright 2011 GRLab Corporation. All rights reserved.
 * 
 * @since        : 2011. 5. 18.
 * @author       : kim.sh
 */
public class C2DMMessage extends Activity {
	
	/**
	 * C2DM 메시지 입력 에디트텍스
	 */
	private EditText c2dmEditText;
	/**
	 * C2DM 메시지 발신 버튼
	 */
	private Button c2dmButton;

	/* (non-Javadoc)
	 * @see android.app.Activity#onCreate(android.os.Bundle)
	 */
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.screen_c2dm_message);
		// 인텐트 Extra로 부터 C2DM 등록ID 취득
		Bundle bundle = getIntent().getExtras();
		String registrationId = null;
		if (bundle != null && bundle.containsKey(KeyInfo.BUNDLE_KEY_REGISTRATION_ID)) {
			registrationId = bundle.getString(KeyInfo.BUNDLE_KEY_REGISTRATION_ID);
		}
		setViewElements(registrationId);
	}
	
	/**
	 * 화면 뷰 설정
	 * @param registrationId C2DM등록ID
	 */
	private void setViewElements(final String registrationId) {
		
		c2dmEditText = (EditText)findViewById(R.id.c2dmEditText);
		c2dmButton = (Button)findViewById(R.id.c2dmButton);
		c2dmButton.setOnClickListener(new OnClickListener() {
			
			@Override
			public void onClick(View v) {
				// C2DM 메시지 입력 에디트텍스로 부터 입력된 메시지를 취득
				String c2dmMessage = c2dmEditText.getText().toString();
				if (c2dmMessage != null && c2dmMessage.length() > 0) {
					try {
						// C2DM 메시지 발신 처리
						c2dmMessageSend(registrationId, getToken(), c2dmMessage);
					} catch (Exception e) {
						e.printStackTrace();
					}
				} else {
					// 입력된 메시지가 없을 경우, 경고창 출력
					AlertDialog.Builder alert = new AlertDialog.Builder(C2DMMessage.this);
					alert.setMessage(R.string.c2dm_message_input);
					alert.setPositiveButton(R.string.confirm, null);
					alert.show();
				}
			}
		});
		
		
	}
	
	/**
	 * C2DM 인증키 취득
	 * @return
	 * @throws Exception
	 */
	public String getToken() throws Exception{
    	String result = null;
    	StringBuilder sb = new StringBuilder();
    	// Email : SenderID를 설정한다.
    	sb.append("Email=grlabc2dm@gmail.com");
    	// Password : SenderID의 패스워드를 설정한다.
    	sb.append("&Passwd=12grlabc2dm34");
    	// accountType, service는 아래와 똑같이 설정한다.
    	sb.append("&accountType=GOOGLE");
    	sb.append("&service=ac2dm");	
    	// source에는 어플리케이션의 간단한 정보를 설정한다.
    	sb.append("&source=grlab application test");
        byte[] postData = sb.toString().getBytes("UTF-8");

        // 접속 URL
        URL url = new URL("https://www.google.com/accounts/ClientLogin");
    
        HttpURLConnection conn = (HttpURLConnection) url.openConnection();
        conn.setDoOutput(true);
        conn.setUseCaches(false);
        conn.setRequestMethod("POST");
        conn.setRequestProperty("Content-Type", "application/x-www-form-urlencoded");
        conn.setRequestProperty("Content-Length", Integer.toString(postData.length));

        OutputStream out = conn.getOutputStream();
        out.write(postData);
        out.close();

        BufferedReader br = new BufferedReader(new InputStreamReader(conn.getInputStream()));
        
        String line = null;
        String authLine = null;
        while ((line = br.readLine()) != null) {
            Log.d(getClass().getSimpleName(), "[line]" + line);
        	if (line.startsWith("Auth")) {
        		authLine = line;
        	}
        }
        Log.d(getClass().getSimpleName(), "[authLine]" + authLine);
        result = authLine.substring(5, authLine.length());
  
        return result;
    }
	
    /**
     * C2DM메시지 발신
     * @param regId C2DM 등록ID
     * @param authToken 인증키
     * @param msg 메시지
     * @throws Exception
     */
    public void c2dmMessageSend(String regId, String authToken,String msg) throws Exception{
    	
    	StringBuilder sb = new StringBuilder();
    	sb.append("registration_id=");
    	sb.append(regId);
    	sb.append("&collapse_key=1"); 
    	sb.append("&delay_while_idle=1");
    	sb.append("&data.msg=");
    	sb.append(URLEncoder.encode(msg, "UTF-8"));
        
    	byte[] postData = sb.toString().getBytes("UTF-8");

        URL url = new URL("https://android.apis.google.com/c2dm/send");
        
        HttpURLConnection conn = (HttpURLConnection) url.openConnection();
        
        conn.setDoOutput(true);
        conn.setUseCaches(false);
        conn.setRequestMethod("POST");
        
        conn.setRequestProperty("Content-Type", "application/x-www-form-urlencoded");
        conn.setRequestProperty("Content-Length", Integer.toString(postData.length));
        conn.setRequestProperty("Authorization", "GoogleLogin auth=" + authToken);

        OutputStream out = conn.getOutputStream();
        out.write(postData);
        out.close();

        BufferedReader br = new BufferedReader(new InputStreamReader(conn.getInputStream()));
        String line = null;
        while ((line = br.readLine()) != null) {
            Log.d(getClass().getSimpleName(), "[line]" + line);
        }
    }
}
