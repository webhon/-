package com.grlab.android.project.receiver;


import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.util.Log;
import android.widget.Toast;

import com.grlab.android.project.constant.KeyInfo;


/**
 * C2DM브로드캐스트 클래스
 * 
 * @(#)C2DMReceiver.java
 * @ Copyright 2011 GRLab Corporation. All rights reserved.
 * 
 * @since        : 2011. 5. 22.
 * @author       : kim.sh
 */
public class C2DMReceiver extends BroadcastReceiver {

	/* (non-Javadoc)
	 * @see android.content.BroadcastReceiver#onReceive(android.content.Context, android.content.Intent)
	 */
	@Override
	public void onReceive(Context context, Intent intent) {
		// 인텐트 액션에 따라 분기
		if ("com.google.android.c2dm.intent.REGISTRATION".equals(intent.getAction())) {
			// C2DM 등록ID를 설정
			handleC2DMRegistration(context, intent);
		} else if ("com.google.android.c2dm.intent.RECEIVE".equals(intent.getAction())) {
			// C2DM으로부터 받은 메세지를 표시
			handleC2DMMessage(context, intent);
		} 
	}

	/**
	 * C2DM등록 처리
	 * @param context 콘텍스트
	 * @param intent 인텐트
	 */
	private void handleC2DMRegistration(Context context, Intent intent) {
		
		String registrationId = intent.getStringExtra("registration_id");
		String registrationError = intent.getStringExtra("error");
		String unregistered = intent.getStringExtra("unregistered");
		// 에러메세지를 포함할 경우
		if (registrationError != null) {
			Log.e(getClass().getSimpleName(), 
					"[" + registrationError + "]"+"등록에 실패했습니다. 다시 등록해 주세요.");
		// 등록취소 메세지를 포함할 경우
		} else if (unregistered != null) {
			Log.e(getClass().getSimpleName(), 
					"[" + unregistered+ "]"+ "등록 취소가 완료되었습니다. ");
		// 정상적으로 등록되었을 경우
		} else if (registrationId != null) {
			Log.d(getClass().getSimpleName(), "[registrationId]" + registrationId);
			// 등록ID를 저장 
			SharedPreferences sp = context.getSharedPreferences(KeyInfo.SP_NAME_C2DM_INFO, Context.MODE_PRIVATE);
			SharedPreferences.Editor prefEditor = sp.edit();
			prefEditor.putString(KeyInfo.SP_KEY_C2DM_REGISTRATION_ID, registrationId);
			prefEditor.commit();
			
		} else {
			Log.e(getClass().getSimpleName(), "등록 중 알수 없는 에러가 발생했습니다.");
		}
	}

	/**
	 * C2DM 메시지 발송 처리
	 * @param context 콘텍스트
	 * @param intent 인텐트
	 */
	private void handleC2DMMessage(Context context, Intent intent) {
		String message = intent.getExtras().getString("msg");
		String title = intent.getExtras().getString("title");
		Log.d(getClass().getSimpleName(), "title:" + title);
		// 메세지를 표시
		Toast.makeText(context, message, Toast.LENGTH_SHORT).show();
	}
}
