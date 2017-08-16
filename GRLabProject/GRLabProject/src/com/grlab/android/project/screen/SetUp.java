/**
 * 
 */
package com.grlab.android.project.screen;

import java.util.ArrayList;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.BaseAdapter;
import android.widget.CheckBox;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.AdapterView.OnItemClickListener;

import com.grlab.android.project.R;
import com.grlab.android.project.constant.KeyInfo;

/**
 * 설정화면
 * 
 * @(#)SetUp.java
 * @ Copyright 2011 GRLab Corporation. All rights reserved.
 * 
 * @since        : 2011. 6. 21.
 * @author       : kim.sh
 */
public class SetUp extends Activity {

	/**
	 * 리스트 타입(타이틀)
	 */
	private static final int TYPE_TITLE = 0;
	/**
	 * 리스트 타입(체크박스)
	 */
	private static final int TYPE_CHECK = 1;
	/**
	 * 리스트 타입(링크)
	 */
	private static final int TYPE_LINK = 2;
	/**
	 * 리스트뷰
	 */
	private ListView listView;
	/**
	 * 설정정보 리스트
	 */
	private ArrayList<SetUpInfo> list;

	/* (non-Javadoc)
	 * @see android.app.Activity#onCreate(android.os.Bundle)
	 */
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.screen_setup);
		// 상수 KeyInfo.SP_NAME_SETUP_INFO에 해당하는 SharedPreferences 정보 취득
		SharedPreferences sp = getSharedPreferences(KeyInfo.SP_NAME_SETUP_INFO,
				MODE_PRIVATE);

		listView = (ListView) findViewById(R.id.list1);
		// 어댑터에 사용할 정보 생성
		list = new ArrayList<SetUpInfo>();
		// 위치설정 라벨
		list.add(new SetUpInfo(TYPE_TITLE, getString(R.string.setup_location), false, null));
		// 내 현재위치 노출 설정 체크박스
		list.add(new SetUpInfo(TYPE_CHECK, getString(R.string.setup_mylocation_enable), sp.getBoolean(
				KeyInfo.SP_KEY_SETUP_CURRENT_POSITION_SHOW, false),
				KeyInfo.SP_KEY_SETUP_CURRENT_POSITION_SHOW));
		// 현재위치 지도 표시 링크
		list.add(new SetUpInfo(TYPE_LINK, getString(R.string.setup_mylocation_map), false, null));
		// 검색범위 라벨
		list.add(new SetUpInfo(TYPE_TITLE, getString(R.string.setup_search_range), false, null));
		// 검색범위 카페 설정 체크박스
		list.add(new SetUpInfo(TYPE_CHECK, getString(R.string.cafe), sp.getBoolean(
				KeyInfo.SP_KEY_SETUP_SEARCH_CATEGORY_CAFE, false),
				KeyInfo.SP_KEY_SETUP_SEARCH_CATEGORY_CAFE));
		// 검색범위 블로그 설정 체크박스
		list.add(new SetUpInfo(TYPE_CHECK, getString(R.string.blog), sp.getBoolean(
				KeyInfo.SP_KEY_SETUP_SEARCH_CATEGORY_BLOG, false),
				KeyInfo.SP_KEY_SETUP_SEARCH_CATEGORY_BLOG));
		// 검색범위 뉴스 설정 체크박스
		list.add(new SetUpInfo(TYPE_CHECK, getString(R.string.news), sp.getBoolean(
				KeyInfo.SP_KEY_SETUP_SEARCH_CATEGORY_NEWS, false),
				KeyInfo.SP_KEY_SETUP_SEARCH_CATEGORY_NEWS));
		// 검색범위 웹문서 설정 체크박스
		list.add(new SetUpInfo(TYPE_CHECK, getString(R.string.web_doc), sp.getBoolean(
				KeyInfo.SP_KEY_SETUP_SEARCH_CATEGORY_WEB, false),
				KeyInfo.SP_KEY_SETUP_SEARCH_CATEGORY_WEB));
		// SNS 연동 라벨
		list.add(new SetUpInfo(TYPE_TITLE, getString(R.string.setup_sns), false, null));
		// 인증키 저장 설정 체크박스
		list.add(new SetUpInfo(TYPE_CHECK, getString(R.string.setup_save_auth), sp.getBoolean(
				KeyInfo.SP_KEY_SETUP_AUTH_KEY_SAVE, false),
				KeyInfo.SP_KEY_SETUP_AUTH_KEY_SAVE));
		// APP 라벨
		list.add(new SetUpInfo(TYPE_TITLE, "APP", false, null));
		// 어플리케이션 정보 표시 링크
		list.add(new SetUpInfo(TYPE_LINK, getString(R.string.setup_app_info), false, null));

		SetUpAdatper adapter = new SetUpAdatper(this, list);
		listView.setAdapter(adapter);
		listView.setOnItemClickListener(new OnItemClickListener() {

			@Override
			public void onItemClick(AdapterView<?> arg0, View convertView,
					int index, long arg3) {
				// 인덱스에 해당하는 설정정보를 취득
				SetUpInfo info = list.get(index);
				// 설정정보의 타입에 따라 처리 분기
				switch (info.type) {
				case TYPE_TITLE:
					break;
				case TYPE_CHECK:
					// 타입이 체크박스일 경우, 체크박스를 참조한다.
					CheckBox checkBox = (CheckBox) convertView
							.findViewById(R.id.checkBox);
					// KeyInfo.SP_NAME_SETUP_INFO 상수에 해당하는 SharedPreferences를
					// 취득한다.
					SharedPreferences sp = getSharedPreferences(
							KeyInfo.SP_NAME_SETUP_INFO, MODE_PRIVATE);
					// SharedPreferences로부터 Editor 객체를 취득한다.
					SharedPreferences.Editor prefEditor = sp.edit();
					if (checkBox.isChecked()) {
						// 체크박스에 체크가 되어 있는 경우,
						// 체크표시를 없애고, SharedPreferences에 저장한다.
						checkBox.setChecked(false);
						info.isChecked = false;
						prefEditor.putBoolean(info.spKey, false);
					} else {
						// 체크박스에 체크가 되어 있지 않은 경우,
						// 체크표시를 하고, SharedPreferences에 저장한다.
						checkBox.setChecked(true);
						info.isChecked = true;
						prefEditor.putBoolean(info.spKey, true);
					}
					prefEditor.commit();
					break;
				case TYPE_LINK:
					// 타입이 링크일 경우, 각각 항목에 해당하는 화면으로 이동한다.
					Intent intent = null;
					if (getString(R.string.setup_mylocation_map).equals(info.title)) {
						intent = new Intent(SetUp.this, MyLocation.class);
					} else if (getString(R.string.setup_app_info).equals(info.title)) {
						intent = new Intent(SetUp.this, AppInfo.class);
					}
					startActivity(intent);
					break;
				default:
					break;
				}
			}
		});

	}

	/**
	 * 설정리스트 어댑터
	 * 
	 * @since        : 2011. 6. 21.
	 * @author       : kim.sh
	 */
	private class SetUpAdatper extends BaseAdapter {

		private Context context;
		private ArrayList<SetUpInfo> list;

		public SetUpAdatper(Context context, ArrayList<SetUpInfo> list) {
			this.context = context;
			this.list = list;
		}

		@Override
		public int getCount() {
			return list.size();
		}

		@Override
		public Object getItem(int arg0) {
			return list.get(arg0);
		}

		@Override
		public long getItemId(int arg0) {
			return arg0;
		}

		@Override
		public View getView(int position, View convertView, ViewGroup parent) {
			// 리스트뷰 인덱스에 해당하는 설정정보 객체를 취득한다.
			SetUpInfo setUpInfo = list.get(position);
			TextView textView = null;
			// 설정정보 객체의 타입변수에 따라 각각의 레이아웃XML를 inflate한다.
			switch (setUpInfo.type) {
			case TYPE_TITLE:
				convertView = ((LayoutInflater) context
						.getSystemService(Context.LAYOUT_INFLATER_SERVICE))
						.inflate(R.layout.item_header, parent, false);
				textView = (TextView) convertView.findViewById(R.id.label);
				break;
			case TYPE_CHECK:
				convertView = ((LayoutInflater) context
						.getSystemService(Context.LAYOUT_INFLATER_SERVICE))
						.inflate(R.layout.item_text_checkbox, parent, false);
				textView = (TextView) convertView
						.findViewById(R.id.titleCheckBox);
				CheckBox checkBox = (CheckBox) convertView
						.findViewById(R.id.checkBox);
				checkBox.setChecked(setUpInfo.isChecked);
				break;
			case TYPE_LINK:
				convertView = ((LayoutInflater) context
						.getSystemService(Context.LAYOUT_INFLATER_SERVICE))
						.inflate(R.layout.item_text, parent, false);
				textView = (TextView) convertView.findViewById(R.id.titleNone);
				break;
			default:
				break;
			}

			textView.setText(setUpInfo.title);

			return convertView;
		}
	}

	/**
	 * 설정정보 Bean
	 * 
	 * @since        : 2011. 6. 21.
	 * @author       : kim.sh
	 */
	private class SetUpInfo {

		private int type;
		private String title;
		private boolean isChecked;
		private String spKey;

		public SetUpInfo(int type, String title, boolean isChecked, String spKey) {
			this.type = type;
			this.title = title;
			this.isChecked = isChecked;
			this.spKey = spKey;
		}
	}
}
