/**
 * 
 */
package com.grlab.android.project.screen;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

import android.app.Activity;
import android.app.AlertDialog;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.text.Html;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.AdapterView.OnItemClickListener;

import com.grlab.android.project.R;
import com.grlab.android.project.constant.KeyInfo;
import com.grlab.android.project.util.NaverParser;

/**
 * 네이버 검색 화면
 * 
 * @(#)NaverList.java
 * @ Copyright 2011 GRLab Corporation. All rights reserved.
 * 
 * @since        : 2011. 6. 21.
 * @author       : kim.sh
 */
public class NaverList extends Activity {

	/**
	 * 검색 카테고리 스피너
	 */
	private Spinner categorySpinner;
	/**
	 * 리스트뷰
	 */
	private ListView listView;
	/**
	 * 검색어 입력 에디트 텍스트
	 */
	private EditText searchEditText;
	/**
	 * 검색 총 개수
	 */
	private int totalCount;
	/**
	 * 시작 인덱스
	 */
	private int start_;
	/**
	 * 더보기 버튼
	 */
	private Button footterBtn;
	/**
	 * 네이버 검색 데이터 어댑터
	 */
	private NaverAdapter adapter;
	/**
	 * 검색 카테고리(영문)리스트
	 */
	private ArrayList<String> enCategoryList = new ArrayList<String>();
	/**
	 * 검색 카테고리(한글)리스트
	 */
	private ArrayList<String> koCategoryList = new ArrayList<String>();

	/* (non-Javadoc)
	 * @see android.app.Activity#onCreate(android.os.Bundle)
	 */
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.screen_naver_list);
		listView = (ListView) findViewById(R.id.list1);
		// 설정화면에서 설정한 검색어 카테고리 사용 유무를 SharedPreferences로 부터 취득하여
		// 각 영문/한글 리스트에 추가한다.
		SharedPreferences sp = getSharedPreferences(KeyInfo.SP_NAME_SETUP_INFO,
				MODE_PRIVATE);
		if (sp.getBoolean(KeyInfo.SP_KEY_SETUP_SEARCH_CATEGORY_BLOG, false)) {
			enCategoryList.add("blog");
			koCategoryList.add(getString(R.string.blog));
		}
		if (sp.getBoolean(KeyInfo.SP_KEY_SETUP_SEARCH_CATEGORY_CAFE, false)) {
			enCategoryList.add("cafearticle");
			koCategoryList.add(getString(R.string.cafe));
		}
		if (sp.getBoolean(KeyInfo.SP_KEY_SETUP_SEARCH_CATEGORY_WEB, false)) {
			enCategoryList.add("webkr");
			koCategoryList.add(getString(R.string.web_doc));
		}
		if (sp.getBoolean(KeyInfo.SP_KEY_SETUP_SEARCH_CATEGORY_NEWS, false)) {
			enCategoryList.add("news");
			koCategoryList.add(getString(R.string.news));
		}
		// 검색 카테고리 스피너에 설정할 ArrayAdapter생성
		ArrayAdapter<String> categoryAdapter = new ArrayAdapter<String>(this,
				android.R.layout.simple_spinner_item, koCategoryList);
		categoryAdapter
				.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
		categorySpinner = (Spinner) findViewById(R.id.naverSpinner);
		categorySpinner.setAdapter(categoryAdapter);
		
		searchEditText = (EditText) findViewById(R.id.searchEditText);
		Button searchButton = (Button) findViewById(R.id.searchButton);
		// 검색 버튼 이벤트 설정
		searchButton.setOnClickListener(new View.OnClickListener() {

			@Override
			public void onClick(View v) {
				// 검색어 유효성 체크 결과가 참일때,
				if (searchEditText.getText().length() > 0) {
					// 푸터 View객체가 있을 경우 View객체를 제거한다.
					if (listView.getFooterViewsCount() > 0) {
						listView.removeFooterView(footterBtn);
					}
					// 검색요청
					requestData();
					// 검색어 유효성 체크 결과가 거짓일때,
				} else {
					AlertDialog.Builder ab = new AlertDialog.Builder(
							NaverList.this);
					ab.setPositiveButton(R.string.confirm, null);
					ab.setMessage(R.string.search_input);
					ab.show();
				}
			}
		});
		// 리스트뷰 항목 클릭 이벤트 설정
		listView.setOnItemClickListener(new OnItemClickListener() {

			@Override
			public void onItemClick(AdapterView<?> arg0, View arg1, int arg2,
					long arg3) {
				// View객체 Tag에 설정한 링크 URL을 취득
				String url = (String) arg1.getTag();
				// 링크 URL을 Extra에 저장하여 네이버 검색 상세 결과 화면으로 이동
				Bundle bundle = new Bundle();
				bundle.putString(KeyInfo.BUNDLE_KEY_NAVER_URL, url);
				Intent intent = new Intent(NaverList.this, NaverDetail.class);
				intent.putExtras(bundle);
				startActivity(intent);
			}
		});
	}
	
	/**
	 * 네이버 검색 요청 처리
	 */
	private void requestData() {
		// 시작 인덱스를 1로 설정
		start_ = 1;
		// NaverParser클래스로 부터 getNaverSearchResultList()메소드를 호출하여 검색 결과를 취득
		ArrayList<HashMap<String, String>> searchResultList = NaverParser
				.getNaverSearchResultList(searchEditText.getText().toString(),
						enCategoryList.get(categorySpinner.getSelectedItemPosition()), 20, 1);
		// 검색결과 전체 개수를 취득
		totalCount = Integer.parseInt(searchResultList.get(0).get("total"));
		// 전체 개수가 현재 표시된 리스트뷰의 개수보다 많을 경우, 푸터 View객체(더보기 )버튼을 추가
		if (totalCount > listView.getCount()) {
			footterBtn = new Button(this);
			footterBtn.setText(R.string.more_view);
			// 더보기 버튼 클릭 이벤트
			footterBtn.setOnClickListener(new View.OnClickListener() {

				@Override
				public void onClick(View v) {
					// 검색어에 해당하는 결과 더보기 요청
					moreShowData();
				}
			});
			listView.addFooterView(footterBtn);
		}
		// ArrayAdapter를 상속하는 NaverAdapter를 생성하여 ListView에 설정
		adapter = new NaverAdapter(this, R.layout.item_naver_list,
				searchResultList);
		listView.setAdapter(adapter);
	}
	/**
	 * 더보기 버튼 이벤트에 대한 처리
	 */
	private void moreShowData() {
		// 시작인덱스를 현재 표시된 리스트뷰의 개수 + 1로 설정
		start_ = listView.getCount() + 1;
		// NaverParser클래스로 부터 getNaverSearchResultList()메소드를 호출하여 검색 결과를 취득
		ArrayList<HashMap<String, String>> searchResultList = NaverParser
				.getNaverSearchResultList(searchEditText.getText().toString(),
						enCategoryList.get(categorySpinner.getSelectedItemPosition()), 20, start_);
		// 어댑터에 검색결과를 추가
		adapter.add(searchResultList);
		// 리스트뷰에 반영
		adapter.notifyDataSetChanged();
		// 전체 개수가 현재 표시된 리스트뷰의 개수보다 적거나 같을 경우, 푸터 View객체(더보기 )버튼을 삭제
		if (totalCount <= listView.getCount()) {
			listView.removeFooterView(footterBtn);
		}
	}

	/**
	 * 네이버 데이터 어댑터
	 * 
	 * @since        : 2011. 6. 21.
	 * @author       : kim.sh
	 */
	private class NaverAdapter extends ArrayAdapter<HashMap<String, String>> {
		private int textViewResourceId;
		private ArrayList<HashMap<String, String>> searchResultList;

		public NaverAdapter(Context context, int textViewResourceId,
				ArrayList<HashMap<String, String>> searchResultList) {
			super(context, textViewResourceId, searchResultList);
			this.textViewResourceId = textViewResourceId;
			this.searchResultList = searchResultList;
		}

		public void add(List<HashMap<String, String>> data) {
			// 검색 결과 리스트 개수 만큼 for 루프를 돌려 어댑터에 추가
			for (HashMap<String, String> map : data) {
				add(map);
			}
		}

		@Override
		public View getView(int position, View convertView, ViewGroup parent) {
			// 검색결과 리스트로 부터 인덱스에 해당하는 검색결과 취득
			HashMap<String, String> searchResult = searchResultList
					.get(position);
			if (convertView == null) {
				convertView = ((LayoutInflater) getSystemService(Context.LAYOUT_INFLATER_SERVICE))
						.inflate(textViewResourceId, parent, false);
			}
			// 카테고리 설정
			TextView naverCategory = (TextView) convertView
					.findViewById(R.id.naverCategory);
			naverCategory.setText((String) categorySpinner.getSelectedItem());
			// 제목 설정
			TextView naverTitle = (TextView) convertView
					.findViewById(R.id.naverTitle);
			naverTitle.setText(Html.fromHtml("<u>" + searchResult.get("title")
					+ "</u>"));
			// 내용 설정
			TextView naverContents = (TextView) convertView
					.findViewById(R.id.naverContents);
			naverContents.setText(searchResult.get("description"));
			// 링크URL을 tag에 저장
			convertView.setTag(searchResult.get("link"));
			return convertView;
		}
	}
}
