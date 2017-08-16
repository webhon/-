/**
 * 
 */
package com.grlab.android.project.screen;

import android.content.SharedPreferences;
import android.os.Bundle;

import com.google.android.maps.GeoPoint;
import com.google.android.maps.MapActivity;
import com.google.android.maps.MapController;
import com.google.android.maps.MapView;
import com.google.android.maps.MyLocationOverlay;
import com.grlab.android.project.R;
import com.grlab.android.project.constant.KeyInfo;

/**
 * 내 위치 화면
 * 
 * @(#)MyLocation.java
 * @ Copyright 2011 GRLab Corporation. All rights reserved.
 * 
 * @since        : 2011. 5. 21.
 * @author       : kim.sh
 */
public class MyLocation extends MapActivity {

	/**
	 * 맵뷰
	 */
	private MapView mapView;
	/**
	 * 내위치 오버레이
	 */
	private MyLocationOverlay myLocation;
	/**
	 * 맵컨트롤러
	 */
	private MapController mapCotrol;
	/**
	 * 내 위치 표시 여부
	 */
	private boolean isMyLoactionShow;

	/* (non-Javadoc)
	 * @see com.google.android.maps.MapActivity#onCreate(android.os.Bundle)
	 */
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.screen_my_location);
		// 상수 KeyInfo.SP_NAME_SETUP_INFO에 해당하는 SharedPreferences 정보 취득
		SharedPreferences sp = getSharedPreferences(KeyInfo.SP_NAME_SETUP_INFO, MODE_PRIVATE);
		// 현재 위치 표시 여부 boolean 값 취득
		isMyLoactionShow = sp.getBoolean(KeyInfo.SP_KEY_SETUP_CURRENT_POSITION_SHOW, false);
		
		mapView = (MapView)findViewById(R.id.myLocationMapview);
		mapView.setClickable(true);
		mapView.setBuiltInZoomControls(true);
		
		mapCotrol = mapView.getController();
		mapCotrol.setZoom(16);
		mapCotrol.setCenter(new GeoPoint((int)(37.56647 * 1E6),
				(int)(126.977963 * 1E6)));
		// 현재 위치 표시 여부 값이 true 일 경우,
		if (isMyLoactionShow) {
			// 현재 위치를 오버레이 하는 MyLocationOverlay을 생성하여
			// MapView 의 오버레이 리스트에 추가한다. 
			myLocation = new MyLocationOverlay(this, mapView);
			mapView.getOverlays().add(myLocation);
			// 위치제공자로 부터 처음 정보를 받았을 때 Overlay가 무엇을 해야할지 알림
			myLocation.runOnFirstFix(new Runnable() {
				
				@Override
				public void run() {
					// 화면 중심을 현재 위치로 옮김
					mapCotrol.animateTo(myLocation.getMyLocation());
				}
			});
		}
	}
	
	/* (non-Javadoc)
	 * @see com.google.android.maps.MapActivity#onResume()
	 */
	@Override
	protected void onResume() {
		super.onResume();
		// 현재 위치 표시 여부 값이 true 일 경우, 나의 위치와, 나침반을 표시함
		if (isMyLoactionShow) {
			myLocation.enableMyLocation();
			myLocation.enableCompass();
		}
	}

	/* (non-Javadoc)
	 * @see com.google.android.maps.MapActivity#onPause()
	 */
	@Override
	protected void onPause() {
		super.onPause();
		// 현재 위치 표시 여부 값이 true 일 경우, 나의 위치와, 나침반을 표시하지 않음
		if (isMyLoactionShow) {
			myLocation.disableMyLocation();
			myLocation.disableCompass();
		}
	}
	
	/* (non-Javadoc)
	 * @see com.google.android.maps.MapActivity#isRouteDisplayed()
	 */
	@Override
	protected boolean isRouteDisplayed() {
		return false;
	}
}
