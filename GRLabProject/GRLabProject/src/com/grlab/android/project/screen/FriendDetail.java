package com.grlab.android.project.screen;

import java.io.InputStream;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Iterator;

import android.app.Activity;
import android.app.AlertDialog;
import android.app.PendingIntent;
import android.content.ContentUris;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.net.Uri;
import android.os.Bundle;
import android.provider.ContactsContract;
import android.telephony.SmsManager;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.Spinner;
import android.widget.TextView;

import com.grlab.android.project.R;
import com.grlab.android.project.constant.KeyInfo;
import com.grlab.android.project.helper.FriendDBHelper;

/**
 * 친구소개 상세화면
 * 
 * @(#)FriendDetail.java
 * @ Copyright 2011 GRLab Corporation. All rights reserved.
 * 
 * @since        : 2011. 5. 21.
 * @author       : kim.sh
 */
public class FriendDetail extends Activity {

	/**
	 * 전화번호 스피너
	 */
	private Spinner telSpinner;
	/**
	 * 이메일 스피너
	 */
	private Spinner emailSpinner;
	/**
	 * 등록ID
	 */
	private String registraionId;

	/* (non-Javadoc)
	 * @see android.app.Activity#onCreate(android.os.Bundle)
	 */
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.screen_friend_detail);
		// 단말에 저장된 등록ID를 취득
		SharedPreferences sp = getSharedPreferences(KeyInfo.SP_NAME_C2DM_INFO,
				Context.MODE_PRIVATE);
		registraionId = sp.getString(KeyInfo.SP_KEY_C2DM_REGISTRATION_ID, null);
		// 등롱ID가 없을 경우 C2DM서버로 부터 등록ID를 요청
		if (registraionId == null) {
			Intent registrationIntent = new Intent(
					"com.google.android.c2dm.intent.REGISTER");
			registrationIntent.putExtra("app", PendingIntent.getBroadcast(this,
					0, new Intent(), 0));
			registrationIntent.putExtra("sender", "grlabc2dm@gmail.com");
			startService(registrationIntent);
			registraionId = sp.getString(KeyInfo.SP_KEY_C2DM_REGISTRATION_ID,
					null);
		}
		setViewElements();
	}

	/**
	 * 화면 뷰 설정
	 */
	private void setViewElements() {
		// 레이아웃xml에 정의 되어 있는 View객체를 참조
		ImageView photoImageView = (ImageView) findViewById(R.id.photoImage);
		TextView familyNameTextView = (TextView) findViewById(R.id.familyName);
		TextView givenNameTextView = (TextView) findViewById(R.id.givenName);
		TextView nickNameTextView = (TextView) findViewById(R.id.nickName);
		telSpinner = (Spinner) findViewById(R.id.telSpinner);
		Button telButton = (Button) findViewById(R.id.telButton);
		Button smsButton = (Button) findViewById(R.id.smsButton);
		emailSpinner = (Spinner) findViewById(R.id.emailSpinner);
		Button emailButton = (Button) findViewById(R.id.emailButton);
		Button pushConfirmButton = (Button) findViewById(R.id.pushConfirmButton);
		Button pushButton = (Button) findViewById(R.id.pushButton);
		// 친구리스트에서 저장한 친구 정보를 인텐트로 부터 취득
		Bundle bundle = getIntent().getExtras();
		if (bundle != null && bundle.containsKey("bundle_key_friend_info")) {
			// Serializable 타입이기 때문에 HashMap<String, Object> 타입으로 캐스팅 해야한다.
			HashMap<String, Object> friendInfo = (HashMap<String, Object>) bundle
					.getSerializable("bundle_key_friend_info");

			// 사진 설정
			if (friendInfo.containsKey(FriendList.KEY_CONTACTS_ID)) {
				int contactsId = (Integer) friendInfo
						.get(FriendList.KEY_CONTACTS_ID);
				// contatctsId를 uri로 변환
				Uri uri = ContentUris.withAppendedId(
						ContactsContract.Contacts.CONTENT_URI, contactsId);
				// uri로 부터 주소록 사진 InputStream을 취득
				InputStream input = ContactsContract.Contacts
						.openContactPhotoInputStream(getContentResolver(), uri);
				if (input != null) {
					// InputStream을 Bitmap으로 디코딩하여 photoImageView의 이미지로 설정
					Bitmap contactPhoto = BitmapFactory.decodeStream(input);
					photoImageView.setImageBitmap(contactPhoto);
				}
			}

			// 이름(성) 설정
			if (friendInfo.containsKey(FriendList.KEY_NAME_FAMILY)) {
				String familyName = (String) friendInfo
						.get(FriendList.KEY_NAME_FAMILY);
				familyNameTextView.setVisibility(View.VISIBLE);
				familyNameTextView.setText(familyName);
			} else {
				familyNameTextView.setVisibility(View.GONE);
			}

			// 이름(명) 설정
			if (friendInfo.containsKey(FriendList.KEY_NAME_GIVEN)) {
				String givenName = (String) friendInfo
						.get(FriendList.KEY_NAME_GIVEN);
				givenNameTextView.setVisibility(View.VISIBLE);
				givenNameTextView.setText(givenName);
			} else {
				givenNameTextView.setVisibility(View.GONE);
			}

			// 별명 설정
			if (friendInfo.containsKey(FriendList.KEY_NICK_NAME)) {
				String nickName = (String) friendInfo
						.get(FriendList.KEY_NICK_NAME);
				nickNameTextView.setVisibility(View.VISIBLE);
				nickNameTextView.setText(nickName);
			} else {
				nickNameTextView.setVisibility(View.GONE);
			}

			// 전화번호 설정
			if (friendInfo.containsKey(FriendList.KEY_PHONE_INFO)) {
				// 전화 번호는 종류가 많기 때문에 Map(키-밸류)으로 설정하였다.
				HashMap<String, String> phoneMap = (HashMap<String, String>) friendInfo
						.get(FriendList.KEY_PHONE_INFO);
				Iterator<String> ite = phoneMap.keySet().iterator();
				ArrayList<String> phoneNumberList = new ArrayList<String>();
				while (ite.hasNext()) {
					String key = ite.next();
					String value = phoneMap.get(key);
					phoneNumberList.add(value);
				}
				// 취득한 전화번로 전화번호 스피너의 어댑터를 생성하여 설정한다.
				ArrayAdapter<String> adapter = new ArrayAdapter<String>(this,
						android.R.layout.simple_spinner_item, phoneNumberList);
				adapter
						.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
				telSpinner.setAdapter(adapter);
			}

			// 이메일 설정
			if (friendInfo.containsKey(FriendList.KEY_EMAIL_INFO)) {
				// 전화번호와 마찬가지로 Map(키-밸류)으로 설정하였다.
				HashMap<String, String> emailMap = (HashMap<String, String>) friendInfo
						.get(FriendList.KEY_EMAIL_INFO);
				Iterator<String> ite = emailMap.keySet().iterator();

				ArrayList<String> emailList = new ArrayList<String>();
				while (ite.hasNext()) {
					String key = ite.next();
					String value = emailMap.get(key);
					emailList.add(value);
				}
				// 취득한 이메일 주소로 이메일 스피너의 어댑터를 생성하여 설정한다.
				ArrayAdapter<String> adapter = new ArrayAdapter<String>(this,
						android.R.layout.simple_spinner_item, emailList);
				adapter
						.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
				emailSpinner.setAdapter(adapter);
			}

			// 전화걸기 버튼을 클릭할 경우, 다이얼 화면을 호출한다.
			telButton.setOnClickListener(new OnClickListener() {
				@Override
				public void onClick(View v) {
					if (telSpinner.getCount() > 0) {
						Uri uri = Uri.parse("tel:"
								+ (String) telSpinner.getSelectedItem());
						Intent intent = new Intent(Intent.ACTION_DIAL, uri);
						startActivity(intent);
					} else {
						showAlertDialog(getString(R.string.friend_detail_msg_phone_select));
					}
				}
			});

			// SMS전송 버튼을 클릭할 경우, SMS어플을 호출한다.
			smsButton.setOnClickListener(new OnClickListener() {
				@Override
				public void onClick(View v) {
					if (telSpinner.getCount() > 0) {
						Uri uri = Uri.parse("smsto:"
								+ (String) telSpinner.getSelectedItem());
						Intent it = new Intent(Intent.ACTION_SENDTO, uri);
						it.putExtra("sms_body", getString(R.string.friend_detail_msg_send));
						startActivity(it);
					} else {
						showAlertDialog(getString(R.string.friend_detail_msg_phone_select));
					}
				}
			});

			// 친구에게 C2DM메시지 사용 알림 버튼을 클릭할 경우,
			// 스피너에서 선택한 전화번호로 자신의 등록ID를 보낸다.
			pushConfirmButton.setOnClickListener(new OnClickListener() {
				@Override
				public void onClick(View v) {
					if (telSpinner.getCount() > 0) {
						sendSMS((String) telSpinner.getSelectedItem(),
								registraionId);
					} else {
						showAlertDialog(getString(R.string.friend_detail_msg_phone_select));
					}
				}
			});
			// 전화번호에 해당하는 친구의 등록ID를 DB로 부터 취득
			final String registraionId = getRegistrationId((String) telSpinner
					.getSelectedItem());
			// C2DM 메시지 전송을 클릭할 경우,
			// C2DM메시지 전송 화면으로 이동한다.
			pushButton.setOnClickListener(new OnClickListener() {
				@Override
				public void onClick(View v) {
					if (registraionId != null) {
						if (telSpinner.getCount() > 0) {
							try {
								Intent intent = new Intent(FriendDetail.this,
										C2DMMessage.class);
								intent.putExtra(
										KeyInfo.BUNDLE_KEY_REGISTRATION_ID,
										registraionId);
								startActivity(intent);
							} catch (Exception e) {
								e.printStackTrace();
							}
						} else {
							showAlertDialog(getString(R.string.friend_detail_msg_phone_select));
						}
					} else {
						showAlertDialog(getString(R.string.friend_detail_msg_friend_no_use));
					}
				}
			});

			// 이메일전송 버튼
			emailButton.setOnClickListener(new OnClickListener() {
				@Override
				public void onClick(View v) {
					if (emailSpinner.getCount() > 0) {
						Uri uri = Uri.parse("mailto:"
								+ (String) emailSpinner.getSelectedItem());
						Intent it = new Intent(Intent.ACTION_SENDTO, uri);
						it.putExtra(Intent.EXTRA_SUBJECT, getString(R.string.friend_detail_msg_send));
						it.putExtra(Intent.EXTRA_TEXT, "GOOD!!!");
						startActivity(it);
					} else {
						showAlertDialog(getString(R.string.friend_detail_msg_email_select));
					}
				}
			});
		}
	}

	/**
	 * AlertDialog 표시
	 * @param message 메시지
	 */
	private void showAlertDialog(String message) {
		AlertDialog.Builder ab = new AlertDialog.Builder(this);
		ab.setMessage(message);
		ab.setPositiveButton(R.string.confirm, null);
		ab.show();
	}

	/**
	 * SMS 발송
	 * @param phoneNumber 전화번호
	 * @param message 메시지
	 */
	private void sendSMS(String phoneNumber, String message) {
		// 나의 등록ID를 메시지로 친구에게 SMS로 보낸다.
		// 친구에게 어플리케이션이 설치되어 있으면 
		// 친구의 안드로이드폰DB에 내 등록ID가 저장되어 나에게 
		// C2DM메시지를 보낼 수 있게 된다.
		String[] messages = null;
		if (message.length() > 80) {
			// SMS 길이는 80byte가 한계이기 때문에 둘로 나눠서 보낸다.
			messages = new String[2];
			messages[0] = "1GRL" + message.substring(0, 60);
			messages[1] = "2GRL" + message.substring(60, message.length());
		} else {
			messages = new String[1];
			messages[0] = "1GRL" + message;
		}
		for (String msg : messages) {
			// SMS메시지를 전송한다.
			SmsManager smsManage = SmsManager.getDefault();
			smsManage.sendTextMessage(phoneNumber, null, msg, null,
					null);
		}
	}

	/**
	 * DB로 부터 전화번호에 해당하는 등록ID를 취득
	 * @param phoneNumber
	 * @return registrationId 등록ID
	 */
	private String getRegistrationId(String phoneNumber) {
		// FriendInfo.db의 friend_reg_id테이블(친구 등록ID 테이블)
		// 로 부터 phoneNumber에 해당하는 등록ID를 취득한다.
		String registrationId = null;

		FriendDBHelper mHelper = new FriendDBHelper(this);
		SQLiteDatabase db = mHelper.getReadableDatabase();
		// 등록ID를 두개로 나눠 insert했기 때문에 취득할 때는 연결하여 취득한다.
		Cursor cursor = db.rawQuery(
				"SELECT reg_id1||reg_id2 as reg_id FROM friend_reg_id WHERE phone_no = '"
						+ phoneNumber + "'", null);
		if (cursor.moveToFirst()) {
			registrationId = cursor.getString(0);
		}
		db.close();
		mHelper.close();
		return registrationId;
	}
}
