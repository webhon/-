/**
 * 
 */
package com.grlab.android.project.screen;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

import org.json.JSONArray;
import org.json.JSONObject;

import android.app.Activity;
import android.app.AlertDialog;
import android.content.SharedPreferences;
import android.content.SharedPreferences.Editor;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.EditText;

import com.grlab.android.project.R;
import com.grlab.android.project.constant.KeyInfo;

/**
 * 로그인 화면
 * 
 * @(#)Login.java
 * @ Copyright 2011 GRLab Corporation. All rights reserved.
 * 
 * @since        : 2011. 5. 21.
 * @author       : kim.sh
 */
public class Login extends Activity {
	
	/**
	 * 아이디 입력 에디트 텍스트
	 */
	private EditText idEditText;
	/**
	 * 패스워드 입력 에디트 텍스트
	 */
	private EditText pwEditText;
	/**
	 * 아이디 저장 체크박스
	 */
	private CheckBox idSaveCheckBox;
	/**
	 * 로그인 버튼
	 */
	private Button loginButton;

	/* (non-Javadoc)
	 * @see android.app.Activity#onCreate(android.os.Bundle)
	 */
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.screen_login);
		setViewElements();
	}
	
	/**
	 * 화면 뷰 설정
	 */
	private void setViewElements() {
		idEditText = (EditText)findViewById(R.id.idEditText);
		pwEditText = (EditText)findViewById(R.id.pwEditText);
		idSaveCheckBox = (CheckBox)findViewById(R.id.idSaveCheckBox);
		// SharedPreferences로 부터 저장된 ID를 취득
		SharedPreferences sp = getPreferences(MODE_PRIVATE);
		String userId = sp.getString(KeyInfo.BUNDLE_KEY_USER_ID, "");
		// ID 값이 있을 경우, 체크박스 표시를 하고, ID를 입력창에 표시
		if (userId.length() > 0) {
			idSaveCheckBox.setChecked(true);
			idEditText.setText(userId);
			idEditText.setSelection(idEditText.length());
		}
		
		loginButton = (Button)findViewById(R.id.loginButton);
		// 로그인 버튼 클릭 이벤트
		loginButton.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View v) {
				// ID 유효성체크 : 입력 유무를 체크하여, 미입력시, 경고창 출력
				if (idEditText.getText().length() <= 0) {
					new AlertDialog.Builder(Login.this)
					.setPositiveButton(R.string.confirm, null)
					.setMessage(R.string.login_id_input)
					.show();
				// 패스워드 유효성체크 : 입력 유무를 체크하여, 미입력시, 경고창 출력
				} else if (pwEditText.getText().length() <= 0) {
					new AlertDialog.Builder(Login.this)
					.setPositiveButton(R.string.confirm, null)
					.setMessage(R.string.login_pw_input)
					.show();
				// ID,패스워드 입력값이 유효할 경우
				} else {
					try {
						String id = idEditText.getText().toString();
						String pw = pwEditText.getText().toString();
						// 블로그로 부터 이미 정해 놓은 ID/PW 값 Json객체를 취득
						JSONObject jsonResult = getLoginData();
						// Json값 중 키값"id_list"에 해당하는 Json리스트를 취득
						JSONArray jsonArray = jsonResult.getJSONArray("id_list");
						// 로그인 성공여부 boolean
						boolean isLogin = false;
						for (int i = 0 ; jsonArray.length() > i ; i++) {
							// Json리스트 크기 만큼 for 루프를 돌려 Json객체 취득
							JSONObject json = (JSONObject)jsonArray.get(i);
							// 키값 id에 해당하는 밸류값을 취득해 입력한 ID와 비교
							// 키값 password에 해당하는 밸류값을 취득해 입력한 패스워드와 비교
							if (id.equals(json.getString("id"))
									&& pw.equals(json.getString("password"))) {
								// 비교 결과, 참일 경우 로그인 성공여부 boolean 값에 true를 설정
								isLogin = true;
								break;
							} 
						}
						// 로그인 성공여부가 true일 경우.
						if (isLogin) {
							SharedPreferences sp = getPreferences(MODE_PRIVATE);
							Editor editor = sp.edit();
							// 체크박스에 체크 표시가 되어있을 경우, SharedPreferences에 id를 저장
							if (idSaveCheckBox.isChecked()) {
								editor.putString(KeyInfo.BUNDLE_KEY_USER_ID, id);
							// 체크박스에 체크 표시가 되어있지 않을 경우, SharedPreferences의 id를 삭제
							} else {
								editor.remove(KeyInfo.BUNDLE_KEY_USER_ID);
							}
							editor.commit();
							// 메인메뉴 Acitvity의 onActivityResult()메소드에 넘겨 줄 결과값
							setResult(RESULT_OK);
							// Activity 종료
							finish();
						// 로그인 성공여부가 false일 경우.
						} else {
							// 경고창 출력
							new AlertDialog.Builder(Login.this)
							.setPositiveButton(R.string.confirm, null)
							.setMessage(R.string.login_id_pw_no_equal)
							.show();
							setResult(RESULT_CANCELED);
						}
						
					} catch (Exception e) {
						// TODO Auto-generated catch block
						e.printStackTrace();
					}
				}
			}
		});
	}
	
	/**
	 * 특정 웹으로 부터 로그인 JSON 정보 취득
	 * @return JsonObject result
	 * @throws Exception
	 */
	private JSONObject getLoginData() throws Exception{
		JSONObject result = null;
		// URL 생성 : 블로그에 저장한 Json 형식의 Html파일을 타겟으로 생성
		URL url = new URL("http://goo.gl/oCuzp");
		// URL 커넥션 오픈
		HttpURLConnection conn = (HttpURLConnection)url.openConnection();
		StringBuilder sb = new StringBuilder();
		InputStream is = null;
		InputStreamReader isr = null;
		BufferedReader br = null;
		// 서버에 요청을 보낸 결과가 OK일 경우.
		if (conn.getResponseCode() == HttpURLConnection.HTTP_OK) {
			// 커넥션으로 부터 입력스트림 취득
			is = conn.getInputStream();
			isr = new InputStreamReader(is);
			br = new BufferedReader(isr);
			String line = null;
			// 스트림으로 부터 읽어들인 결과값을 StringBuilder에 추가한다.
			while ((line = br.readLine()) != null) {
				sb.append(line);
			}
		}
		if (sb.length() > 0) {
			// 스트림으로 부터 읽어 들인 결과값을 Json객체 형식으로 생성한다.
			result = new JSONObject(sb.toString());
		}
		// 다 쓴 스트림 객체는 닫아 준다.
		if (is != null)is.close();
		if (isr != null)isr.close();
		if (br != null)br.close();
		
		return result;
	}
}
