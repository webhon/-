/**
 * 
 */
package com.grlab.android.project.receiver;

import android.content.BroadcastReceiver;
import android.content.ContentValues;
import android.content.Context;
import android.content.Intent;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.os.Bundle;
import android.telephony.SmsMessage;

import com.grlab.android.project.helper.FriendDBHelper;

/**
 *  SMS브로드캐스트 클래스
 * 
 * @(#)SMSReceiver.java
 * @ Copyright 2011 InfoBank Corporation. All rights reserved.
 * 
 * @since        : 2011. 5. 18.
 * @author       : kim.sh
 */
public class SMSReceiver extends BroadcastReceiver {

	/* (non-Javadoc)
	 * @see android.content.BroadcastReceiver#onReceive(android.content.Context, android.content.Intent)
	 */
	@Override
	public void onReceive(Context context, Intent intent) {
		// SMS를 수신할 경우 SMSReceiver 가 호출된다. 
		handleSMSMessage(context, intent);

	}

	/**
	 * SMS메시지 수신처리
	 * @param context 콘텍스트
	 * @param intent 인텐트
	 */
	private void handleSMSMessage(Context context, Intent intent) {

		Bundle bundle = intent.getExtras();
		// "pdus"를 키로 SMS 정보 취득
		if (bundle != null && bundle.containsKey("pdus")) {
			Object[] pdus = (Object[]) bundle.get("pdus");
			SmsMessage[] smsMessages = new SmsMessage[pdus.length];
			for (int i = 0; i < smsMessages.length; i++) {
				smsMessages[i] = SmsMessage.createFromPdu((byte[]) pdus[i]);
				if (smsMessages[i] != null) {
					if (smsMessages[i].getOriginatingAddress() != null
							&& smsMessages[i].getOriginatingAddress()
									.startsWith("01")) {
						updateRegistrationId(context, smsMessages[i]
								.getOriginatingAddress(), smsMessages[i]
								.getMessageBody().toString());
					}
				}
			}
		}
	}

	/**
	 * SMS 메시지로 부터 C2DM 등록 ID를 취득하여 DB에 저장
	 * @param context 콘텍스트
	 * @param phoneNo 전화번호
	 * @param message SMS 메시지
	 */
	private void updateRegistrationId(Context context, String phoneNo,
			String message) {
		// C2DM 등록ID의 길이가 80byte이상이므로 두개로 잘라서 수신을 받는다.
		// 1GRL, 2GRL로 시작하는 메시지를 C2DM 등록로 판단한다.
		if (message.startsWith("1GRL") || message.startsWith("2GRL")) {
			// 이후의 브로드 캐스트를 무시 시킨다.(SMS 메시지 함으로의 이동을 막음)
			this.abortBroadcast();
			String isRegIdKey = null;
			// DB 컬럼 키 값 설정 
			if (message.startsWith("1GRL")) {
				isRegIdKey = "reg_id1";
			} else {
				isRegIdKey = "reg_id2";
			}
			// 1GRL, 2GRL 문자열을 제외한 등록ID 취득
			message = message.substring(4, message.length());
			ContentValues row = new ContentValues();
			FriendDBHelper mHelper = new FriendDBHelper(context);
			SQLiteDatabase db = mHelper.getReadableDatabase();
			Cursor cursor = db.rawQuery(
					"SELECT * FROM friend_reg_id WHERE phone_no = '" + phoneNo
							+ "'", null);
			int count = cursor.getCount();

			cursor.close();
			mHelper.close();

			db = mHelper.getWritableDatabase();
			// 전화번호에 해당하는 등록ID를 취득하여 행수가 0이상일 경우, 갱신  실행
			if (count > 0) {
				// UPDATE
				row = new ContentValues();
				row.put(isRegIdKey, message);
				db.update("friend_reg_id", row, "phone_no = '" + phoneNo + "'",
						null);
			} else { // 삽입 인서트 실행
				// INSERT
				row.put("phone_no", phoneNo);
				row.put(isRegIdKey, message);
				db.insert("friend_reg_id", null, row);
			}
			mHelper.close();
		}
	}
}
