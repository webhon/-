package com.grlab.android.project.screen;

import com.grlab.android.project.R;
import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.res.ColorStateList;
import android.graphics.Color;
import android.graphics.drawable.StateListDrawable;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

public class MainMenu extends Activity {
	/**
	 * 로그인 인텐트 리퀘스트 코드
	 */
	private static final int LOGIN_REQUEST = 100;
	
	/* (non-Javadoc)
	 * @see android.app.Activity#onCreate(android.os.Bundle)
	 */
	@Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.screen_main_menu);
        // 로그인 화면 으로 이동
        Intent intent = new Intent(this, Login.class);
        startActivityForResult(intent, LOGIN_REQUEST);
        
        // 메뉴 버튼 설정
        for (int i = 1 ; i <= 6 ; i++) {
        	
        	// id명으로부터 리소스id 취득
        	int id = getResources().getIdentifier("button"+ i, "id", "com.grlab.android.project");
        	// 버튼 취득
        	Button btn = (Button)findViewById(id);
        	// 배경 이미지(클릭 ON/OFF)를 생성 하여 설정
        	btn.setBackgroundDrawable(createBackground());
        	// 문자열 색상(클릭 ON/OFF)를 생성 하여 설정
        	btn.setTextColor(createTextColor());
        	
        	final int index = i;
        	btn.setOnClickListener(new View.OnClickListener() {
				
				@Override
				public void onClick(View v) {
					// 버튼 클릭시 명시적 인텐트 액션 실행
					intentAction(index);
				}
			});
        }
    }
    
    /**
     * 명시적 인텐트 액션
     * @param index 인덱스
     */
    private void intentAction(int index) {
    	Intent intent = null;
    	switch (index) {
		case 1:
			// 친구소개
			intent = new Intent(this, FriendList.class);
			break;
		case 2:
			// 설정
			intent = new Intent(this, SetUp.class);
			break;
		case 3:
			// 검색
			intent = new Intent(this, NaverList.class);
			break;
		case 4:
			// 페이스북 인증
			intent = new Intent(this, FacebookAuth.class);
			break;
		case 5:
			// 페이스북 포스트
			intent = new Intent(this, FacebookPost.class);
			break;
		case 6:
			// APP정보
			intent = new Intent(this, AppInfo.class);
			break;
		default:
			break;
		}
    	startActivity(intent);
    }
    
    /**
     * 문자열 색상(클릭 ON/OFF)를 생성
     * @return csl 문자열 색상 리스트
     */
    private ColorStateList createTextColor() {
    	// 상태값을 이중 배열에 설정
    	// 여러 상태를 묶어서 설정하기 위해 이중 배열을 사용
    	int states[][] = new int[][]{{android.R.attr.state_pressed},
    			{-android.R.attr.state_checked, -android.R.attr.state_focused}};
    	// 상태값 순서에 맞게 색상값을 설정
    	int colors[] = new int[]{Color.WHITE, Color.BLACK};
    	ColorStateList csl = new ColorStateList(states, colors);
    	
    	return csl;
    }
    
    /**
     * 배경 이미지(클릭 ON/OFF)를 생성
     * @return sld 이미지 리스트
     */
    private StateListDrawable createBackground() {
    	StateListDrawable sld = new StateListDrawable();
    	// 상태값 배열과, 이미지를 1:1로 설정
    	sld.addState(new int[]{android.R.attr.state_pressed }, getResources().getDrawable(R.drawable.menu_btn_on));
    	sld.addState(new int[]{ -android.R.attr.state_focused },getResources().getDrawable(R.drawable.menu_btn_off));
    	return sld;
    }

	/* (non-Javadoc)
	 * @see android.app.Activity#onActivityResult(int, int, android.content.Intent)
	 */
	@Override
	protected void onActivityResult(int requestCode, int resultCode, Intent data) {
		super.onActivityResult(requestCode, resultCode, data);
		// 로그인 결과 처리
		if (requestCode == LOGIN_REQUEST) {
			if (resultCode == RESULT_OK) {
				Toast.makeText(this, R.string.menu_login_sucess, Toast.LENGTH_SHORT).show();
			} else {
				new AlertDialog.Builder(this)
				.setPositiveButton(R.string.confirm, new DialogInterface.OnClickListener() {
					
					@Override
					public void onClick(DialogInterface dialog, int which) {
				        Intent intent = new Intent(MainMenu.this, Login.class);
				        startActivityForResult(intent, LOGIN_REQUEST);
					}
				})
				.setNegativeButton(R.string.cancel, new DialogInterface.OnClickListener() {
					
					@Override
					public void onClick(DialogInterface dialog, int which) {
						Toast.makeText(MainMenu.this, R.string.menu_app_finish, Toast.LENGTH_SHORT).show();
						finish();
					}
				})
				.setMessage(R.string.menu_login_fail)
				.setCancelable(false)
				.show();
			}
			
		} 
	}
}
