package com.grlab.android.project.screen;

import java.io.InputStream;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Iterator;
import java.util.LinkedHashMap;
import java.util.Map.Entry;

import android.app.ListActivity;
import android.content.ContentResolver;
import android.content.ContentUris;
import android.content.Context;
import android.content.Intent;
import android.database.Cursor;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.net.Uri;
import android.os.Bundle;
import android.provider.ContactsContract;
import android.provider.ContactsContract.Contacts;
import android.provider.ContactsContract.Data;
import android.provider.ContactsContract.CommonDataKinds.Email;
import android.provider.ContactsContract.CommonDataKinds.Nickname;
import android.provider.ContactsContract.CommonDataKinds.Phone;
import android.provider.ContactsContract.CommonDataKinds.StructuredName;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.TextView;

import com.grlab.android.project.R;
import com.grlab.android.project.constant.KeyInfo;

/**
 * 친구소개 리스트 화면
 * 
 * @(#)FriendList.java
 * @ Copyright 2011 GRLab Corporation. All rights reserved.
 * 
 * @since        : 2011. 5. 21.
 * @author       : kim.sh
 */
public class FriendList extends ListActivity {
	/**
	 * 친구 상세 데이터키(컨택트키)
	 */
	public static final String KEY_CONTACTS_ID = "contatcts_id";
	/**
	 * 친구 상세 데이터키(디스플레이 명칭)
	 */
	public static final String KEY_NAME_DISPLAY = "display_name";
	/**
	 * 친구 상세 데이터키(이름(명))
	 */
	public static final String KEY_NAME_GIVEN = "given_name";
	/**
	 * 친구 상세 데이터키(이름(성))
	 */
	public static final String KEY_NAME_FAMILY = "family_name";
	/**
	 * 친구 상세 데이터키(별명)
	 */
	public static final String KEY_NICK_NAME = "nick_name";
	/**
	 * 친구 상세 데이터키(전화번호 정보)
	 */
	public static final String KEY_PHONE_INFO = "phone_info";
	/**
	 * 친구 상세 데이터키(이메일 정보)
	 */
	public static final String KEY_EMAIL_INFO = "email_info";

	/* (non-Javadoc)
	 * @see android.app.Activity#onCreate(android.os.Bundle)
	 */
	@Override
	public void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);

		ArrayList<HashMap<String, Object>> data = createFriendData();
		FriendListAdapter adapter = new FriendListAdapter(this,
				R.layout.item_friend_list, data);
		setListAdapter(adapter);
	}

	/**
	 * 친구상세정보 생성
	 * @return friendDataList
	 */
	private ArrayList<HashMap<String, Object>> createFriendData() {
		// FriendListAdapter에 삽입할 데이터 리스트
		ArrayList<HashMap<String, Object>> friendDataList = new ArrayList<HashMap<String, Object>>();
		// ContentResolver
		ContentResolver resolver = getContentResolver();
		// 주소록 커서
		Cursor contentCursor = resolver.query(Contacts.CONTENT_URI,
				null, null, null, null);
		// 레코드 조회
		while (contentCursor.moveToNext()) {
			// FriendListAdapter에 삽입할 원본 데이터
			HashMap<String, Object> friendData = new HashMap<String, Object>();
			// 컨택트ID취득
			int contactId = contentCursor.getInt(contentCursor
					.getColumnIndex(Contacts._ID));
			friendData.put(KEY_CONTACTS_ID, contactId);
			// 디슬레이 명칭 취득
			String displayName = contentCursor.getString(contentCursor
					.getColumnIndex(Contacts.DISPLAY_NAME));
			friendData.put(KEY_NAME_DISPLAY, displayName);

			// 이름 취득
			// 이름 커서 : 컨택트ID로 검색
			Cursor nameCursor = resolver.query(
					Data.CONTENT_URI,
					null,
					Data.CONTACT_ID + "='" + contactId + "' AND "
							+ Data.MIMETYPE + " = '"
							+ StructuredName.CONTENT_ITEM_TYPE + "'", null,
					null);
			// 레코드 조회
			while (nameCursor.moveToNext()) {
				// 이름(성)취득
				String familyName = nameCursor.getString(nameCursor
						.getColumnIndex(StructuredName.FAMILY_NAME));
				if (familyName != null && familyName.length() > 0) {
					friendData.put(KEY_NAME_FAMILY, familyName);
				}
				// 이름(명)취득
				String givenName = nameCursor.getString(nameCursor
						.getColumnIndex(StructuredName.GIVEN_NAME));
				if (givenName != null && givenName.length() > 0) {
					friendData.put(KEY_NAME_GIVEN, givenName);
				}
			}
			// 별명취득
			// 별명커서 : 컨택트ID로 검색
			Cursor nickNameCursor = resolver.query(
					Data.CONTENT_URI,
					null,
					Data.CONTACT_ID + "='" + contactId + "' AND "
							+ Data.MIMETYPE + " = '"
							+ Nickname.CONTENT_ITEM_TYPE + "'", null, null);
			// 레코드 조회
			while (nickNameCursor.moveToNext()) {
				// 별명취득
				String nickName = nickNameCursor.getString(nickNameCursor
						.getColumnIndex(Nickname.NAME));
				if (nickName != null && nickName.length() > 0) {
					friendData.put(KEY_NICK_NAME, nickName);
				}
			}
			// 전화번호를 가지고 있는가 여부 취득(0:없음, 1:있음)
			int hasPhoneNumber = contentCursor.getInt(contentCursor
					.getColumnIndex(Contacts.HAS_PHONE_NUMBER));
			if (hasPhoneNumber == 1) {
				// 전화번호 커서 : 컨택트ID로 검색
				Cursor phoneCursor = resolver.query(
						Phone.CONTENT_URI, null,
						Phone.CONTACT_ID + "='" + contactId + "'", null, null);
				LinkedHashMap<String, String> phoneInfoMap = null;
				while (phoneCursor.moveToNext()) {
					if (phoneInfoMap == null) {
						phoneInfoMap = new LinkedHashMap<String, String>();
					}
					// 전화번호
					String phoneNumber = phoneCursor.getString(phoneCursor
							.getColumnIndex(Phone.NUMBER));
					// 전화타입(0~20)
					String phoneType = phoneCursor.getString(phoneCursor
							.getColumnIndex(Phone.TYPE));
					// 전화타입과 전화번호를 각각 <key-value>로 LinkedHashMap<String,
					// String>에 저장
					phoneInfoMap.put(phoneType, phoneNumber);
				}
				if (phoneInfoMap != null) {
					friendData.put(KEY_PHONE_INFO, phoneInfoMap);
				}
				// 전화번호 커서 클로즈
				phoneCursor.close();
			} else {
				Log.i(getClass().getSimpleName(), getString(R.string.friend_list_no_phone_no));

			}
			// 이메일 커서 : 컨택트ID로 검색
			Cursor emailCursor = resolver.query(Email.CONTENT_URI,
					new String[] { Email.DATA, Email.TYPE },
					Email.CONTACT_ID + "='" + contactId + "'", null, null);

			LinkedHashMap<String, String> emailInfoMap = null;
			while (emailCursor.moveToNext()) {
				if (emailInfoMap == null) {
					emailInfoMap = new LinkedHashMap<String, String>();
				}
				// 이메일 주소
				String emailAddress = emailCursor.getString(emailCursor
						.getColumnIndex(Email.DATA));
				// 이메일 타입(0~4)
				String emailType = emailCursor.getString(emailCursor
						.getColumnIndex(Email.TYPE));
				// 이메일 타입과 이메일 주소를 각각 <key-value>로 LinkedHashMap<String,
				// String>에 저장
				emailInfoMap.put(emailType, emailAddress);
			}
			if (emailInfoMap != null) {
				friendData.put(KEY_EMAIL_INFO, emailInfoMap);
			}
			// 이메일 커서 클로즈
			emailCursor.close();
			friendDataList.add(friendData);
		}
		// 주소록 커서 클로즈
		contentCursor.close();
		return friendDataList;
	}

	/**
	 * 친구소개 리스트 어댑터
	 * 
	 * @since        : 2011. 5. 21.
	 * @author       : kim.sh
	 */
	private class FriendListAdapter extends ArrayAdapter<HashMap<String, Object>> {

		private Context context_;
		private int itemLayout_;
		private ArrayList<HashMap<String, Object>> itemValueList_;

		public FriendListAdapter(Context context, int itemLayout,
				ArrayList<HashMap<String, Object>> itemValueList) {
			super(context, itemLayout, itemValueList);
			context_ = context;
			itemLayout_ = itemLayout;
			itemValueList_ = itemValueList;
		}

		@Override
		public View getView(int position, View convertView, ViewGroup parent) {
			HashMap<String, Object> itemValue = itemValueList_.get(position);
			if (convertView == null) {
				convertView = ((LayoutInflater) context_
						.getSystemService(Context.LAYOUT_INFLATER_SERVICE))
						.inflate(itemLayout_, parent, false);
			}
			// 주소록 이미지
			if (itemValue.containsKey(KEY_CONTACTS_ID)) {
				// 친구정보 데이터로 부터 contactsId를 취득
				int contactsId = (Integer) itemValue.get(KEY_CONTACTS_ID);
				// 컨텐트URI에 상세 id를 부여한 Uri객체 취득
				Uri uri = ContentUris.withAppendedId(
						ContactsContract.Contacts.CONTENT_URI, contactsId);
				// Uri로 부터 InputStream취득
				InputStream input = ContactsContract.Contacts
						.openContactPhotoInputStream(getContentResolver(), uri);
				ImageView photoImage = (ImageView) convertView
						.findViewById(R.id.photoImage);
				// InputStream이 null이 아닐 경우,
				if (input != null) {
					// InputStream을 디코딩하여 비트맵으로 전환
					Bitmap contactPhoto = BitmapFactory.decodeStream(input);
					// 사진이미지에 설정
					photoImage.setImageBitmap(contactPhoto);
				} else {
					// InputStream이 null일 경우, 리소스의 디폴티 이미지를 설정
					photoImage.setImageResource(R.drawable.ic_contact_picture);
				}
			}
			// 이름
			if (itemValue.containsKey(KEY_NAME_DISPLAY)) {
				// 친구정보 데이터로 부터 디스플레이 명칭을 취득하여 TextView에 설정
				String name = (String) itemValue.get(KEY_NAME_DISPLAY);
				TextView nameText = (TextView) convertView
						.findViewById(R.id.name);
				nameText.setText(name);
			}
			// 전화번호
			if (itemValue.containsKey(KEY_PHONE_INFO)) {

				TextView phoneNumberText = (TextView) convertView
						.findViewById(R.id.phoneNumber);
				// 친구정보 데이터로 부터 전화번호 Map정보를 취득
				LinkedHashMap<String, String> phoneInfo = (LinkedHashMap<String, String>) itemValue
						.get(KEY_PHONE_INFO);
				// 첫번째 전화번호를 TextView에 설정
				Iterator<Entry<String, String>> ite = phoneInfo.entrySet()
						.iterator();
				if (ite.hasNext()) {
					Entry<String, String> ent = ite.next();
					phoneNumberText.setText(ent.getValue());
				}
			}
			// View객체의 tag에 친구정보 데이터를 설정
			convertView.setTag(itemValue);
			return convertView;
		}
	}

	/* (non-Javadoc)
	 * @see android.app.ListActivity#onListItemClick(android.widget.ListView, android.view.View, int, long)
	 */
	@Override
	protected void onListItemClick(ListView l, View v, int position, long id) {
		super.onListItemClick(l, v, position, id);
		// View객체의 Tag로 부터 친구정보 데이터를 취득하여 Extra에 저하여
		// 친구소개 상세화면으로 이동한다.
		HashMap<String, Object> itemValue = (HashMap<String, Object>) v
				.getTag();
		Bundle bundle = new Bundle();
		bundle.putSerializable(KeyInfo.BUNDLE_KEY_FRIEND_INFO,
				itemValue);
		Intent intent = new Intent(FriendList.this, FriendDetail.class);
		intent.putExtras(bundle);
		startActivity(intent);
	}
}
