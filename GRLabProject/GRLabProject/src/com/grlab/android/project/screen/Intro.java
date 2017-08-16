package com.grlab.android.project.screen;

import android.app.Activity;
import android.app.ActivityManager;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.DialogInterface.OnClickListener;
import android.os.Build;
import android.os.Bundle;

import com.grlab.android.project.R;

/**
 * @(#)Intro.java
 * @ Copyright 2011 GRLab Corporation. All rights reserved.
 * 
 * @since        : 2011. 5. 21.
 * @author       : kim.sh
 */
public class Intro extends Activity {

	/* (non-Javadoc)
	 * @see android.app.Activity#onCreate(android.os.Bundle)
	 */
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		
		//레이아웃 리소스를 액티비티 컨텐트로 설정
		setContentView(R.layout.screen_intro);
		
		// OS버전이 허니콤 이상일 경우 경고창 출력 후 확인 버튼 클릭시, 종료 처리
		if (Build.VERSION.SDK_INT >= 11) {
			new AlertDialog.Builder(this)
			.setPositiveButton(R.string.confirm, new OnClickListener() {
				
				@Override
				public void onClick(DialogInterface dialog, int which) {
					applicationFinish();
				}
			})
			.setMessage(getString(R.string.intro_no_support_honeycomb))
			.setCancelable(false).show();
		} else {
			// 쓰레드에서 이미지 노출시간 조절 및 화면이동 처리
			new WaitThread().start();
		} 
	}
	
	/**
	 * 어플리케이션 종료 처리
	 */
	private void applicationFinish() {
		//액티비티 종료
		finish();
		ActivityManager am  =
			(ActivityManager)getSystemService(Activity.ACTIVITY_SERVICE);
		// 어플리케이션 종료
		am.restartPackage(getPackageName());
	}
	
	/**
	 * 인트로 노출 쓰레드
	 * 
	 * @since        : 2011. 5. 21.
	 * @author       : kim.sh
	 */
	private class WaitThread extends Thread {

		@Override
		public void run() {
			try {
				// 3초간 인트로 이미지롤 보여주기 위해 sleep처리 추가
				Thread.sleep(3000);
				// 메뉴화면으로 이동
				Intent intent = new Intent(Intro.this, MainMenu.class);
				startActivity(intent);
				finish();
			} catch (InterruptedException e) {
				e.printStackTrace();
			}
		}
	}
}
