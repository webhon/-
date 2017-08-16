/**
 * 
 */
package com.grlab.android.project.screen;

import java.util.ArrayList;

import android.app.Activity;
import android.content.Context;
import android.content.pm.PackageInfo;
import android.content.pm.PackageManager.NameNotFoundException;
import android.net.wifi.WifiManager;
import android.os.Build;
import android.os.Bundle;
import android.telephony.TelephonyManager;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.view.WindowManager;
import android.widget.BaseAdapter;
import android.widget.ListView;
import android.widget.TextView;

import com.grlab.android.project.R;

/**
 * 어플리케이션 정보 화면
 * 
 * @(#)AppInfo.java
 * @ Copyright 2011 GRLab Corporation. All rights reserved.
 * 
 * @since        : 2011. 5. 21.
 * @author       : kim.sh
 */
public class AppInfo extends Activity {

	/**
	 * 리스트 타입(라벨)
	 */
	private static final int TYPE_LABEL = 0;
	/**
	 * 리스트 타입(어플리케이션 정보)
	 */
	private static final int TYPE_APP_INFO = 1;
	/**
	 * 리스트뷰
	 */
	private ListView listView;

	/* (non-Javadoc)
	 * @see android.app.Activity#onCreate(android.os.Bundle)
	 */
	@Override
	protected void onCreate(Bundle savedInstanceState) {

		super.onCreate(savedInstanceState);
		setContentView(R.layout.screen_app_info);
		listView = (ListView) findViewById(R.id.list1);
		// 어댑터의 데이터로 사용 할 AppInfoBean타입의 ArrayList 생성
		ArrayList<AppInfoBean> list = new ArrayList<AppInfoBean>();
		// 어플리케이션 정보 라벨
		list.add(new AppInfoBean(TYPE_LABEL, getString(R.string.appinfo), null, null));

		try {
			// PackageInfo 클래스로부터 패캐지 명칭, 버전코드, 버전 명칭을 취득하여
			// 각각 AppInfoBean 객체를 생성하여 리스트에 격납
			PackageInfo pi = getPackageManager().getPackageInfo(
					getPackageName(), 0);
			list.add(new AppInfoBean(TYPE_APP_INFO, null, getString(R.string.appinfo_package_name),
					pi.packageName));
			list.add(new AppInfoBean(TYPE_APP_INFO, null, getString(R.string.appinfo_version_code), String
					.valueOf(pi.versionCode)));
			list.add(new AppInfoBean(TYPE_APP_INFO, null, getString(R.string.appinfo_version_name), String
					.valueOf(pi.versionName)));

		} catch (NameNotFoundException e) {
			e.printStackTrace();
		}
		// 단말 정보 라벨
		list.add(new AppInfoBean(TYPE_LABEL, getString(R.string.appinfo_phone_info), null, null));
		// Builde 클래스로부터 모델명칭을 취득하여 Bean객체를 생성, 리스트에 격납.
		list.add(new AppInfoBean(TYPE_APP_INFO, null, getString(R.string.appinfo_phone_name), Build.MODEL));
		// SDK 버전에 따라 OS버전 명칭을 분기, 설정
		String osVersion = null;
		switch (Build.VERSION.SDK_INT) {
//		case Build.VERSION_CODES.ECLAIR:
		case 5:
			osVersion = "2.0(ECLAIR)";
			break;
//		case Build.VERSION_CODES.ECLAIR_0_1:
		case 6:
			osVersion = "2.0.1(ECLAIR)";
//		case Build.VERSION_CODES.ECLAIR_MR1:
		case 7:
			osVersion = "2.1(ECLAIR)";
			break;
//		case Build.VERSION_CODES.FROYO:
		case 8:
			osVersion = "2.2(FROYO)";
			break;
//		case Build.VERSION_CODES.GINGERBREAD:
		case 9:
			osVersion = "2.3(GINGERBREAD)";
			break;
//		case Build.VERSION_CODES.GINGERBREAD_MR1:
		case 10:
			osVersion = "2.3.3(GINGERBREAD)";
			break;
		default:
			osVersion = getString(R.string.appinfo_dont_know);
			break;
		}
		// OS버전
		list.add(new AppInfoBean(TYPE_APP_INFO, null, getString(R.string.appinfo_os_version), osVersion));
		// TelephonyManager 클래스로부터 전화번호를 취득
		TelephonyManager telManager = (TelephonyManager) getSystemService(Context.TELEPHONY_SERVICE);
		list.add(new AppInfoBean(TYPE_APP_INFO, null, getString(R.string.appinfo_phone_number), telManager
				.getLine1Number()));
		// WifiManager 클래스로부터 WifiInfo 클래스를 취득, Mac주소를 취득
		WifiManager wifiManager = (WifiManager) getSystemService(Context.WIFI_SERVICE);
		String macAddress = wifiManager.getConnectionInfo().getMacAddress();
		list.add(new AppInfoBean(TYPE_APP_INFO, null, getString(R.string.appinfo_mac_addr),
				(macAddress != null) ? macAddress : getString(R.string.appinfo_dont_know)));
		// WifiManager 클래스로부터 Display 클래스를 취득, 해상도를 취득
		WindowManager windowManager = (WindowManager) getSystemService(Context.WINDOW_SERVICE);
		int width = windowManager.getDefaultDisplay().getWidth();
		int height = windowManager.getDefaultDisplay().getHeight();

		list.add(new AppInfoBean(TYPE_APP_INFO, null, getString(R.string.appinfo_diplay), width + "x"
				+ height));
		// 만든이 라벨
		list.add(new AppInfoBean(TYPE_LABEL, getString(R.string.appinfo_creator), null, null));
		// 저자 소개
		list.add(new AppInfoBean(TYPE_APP_INFO, null, getString(R.string.appinfo_creator_park),
				getString(R.string.appinfo_creator_park_msg)));
		list.add(new AppInfoBean(TYPE_APP_INFO, null, getString(R.string.appinfo_creator_kim),
				getString(R.string.appinfo_creator_kim_msg)));
		AppInfoAdapter adapter = new AppInfoAdapter(this, list);
		listView.setAdapter(adapter);
	}

	/**
	 * 어플리케이션 정보 어댑터 이너 클래스
	 * 
	 * @since        : 2011. 5. 21.
	 * @author       : kim.sh
	 */
	private class AppInfoAdapter extends BaseAdapter {

		private Context context;
		private ArrayList<AppInfoBean> list;

		public AppInfoAdapter(Context context, ArrayList<AppInfoBean> list) {
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
			// 리스트뷰 인덱스에 해당하는 어플리케이션 정보 객체를 취득한다.
			AppInfoBean appInfoBean = list.get(position);
			// 어플리케이션 정보 객체의 타입변수에 따라 각각의 레이아웃XML를 inflate한다.
			switch (appInfoBean.type) {
			case TYPE_LABEL:
				convertView = ((LayoutInflater) context
						.getSystemService(Context.LAYOUT_INFLATER_SERVICE))
						.inflate(R.layout.item_header, parent, false);
				((TextView) convertView.findViewById(R.id.label))
						.setText(appInfoBean.label);
				break;
			case TYPE_APP_INFO:
				convertView = ((LayoutInflater) context
						.getSystemService(Context.LAYOUT_INFLATER_SERVICE))
						.inflate(R.layout.item_text_two_line, parent, false);
				((TextView) convertView.findViewById(R.id.title))
						.setText(appInfoBean.title);
				((TextView) convertView.findViewById(R.id.contents))
						.setText(appInfoBean.contents);
				break;
			default:
				break;
			}
			return convertView;
		}
	}

	/**
	 * 어플리케이션 정보 Bean
	 * 
	 * @since        : 2011. 5. 21.
	 * @author       : kim.sh
	 */
	private class AppInfoBean {

		private int type;
		private String label;
		private String title;
		private String contents;

		public AppInfoBean(int type, String label, String title, String contents) {
			this.type = type;
			this.label = label;
			this.title = title;
			this.contents = contents;
		}
	}
}
