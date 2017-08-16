package com.grlab.android.project.widget;

import android.content.Context;
import android.content.res.ColorStateList;
import android.content.res.TypedArray;
import android.graphics.drawable.Drawable;
import android.graphics.drawable.StateListDrawable;
import android.util.AttributeSet;
import android.widget.Button;

import com.grlab.android.project.R;

/**
 * 커스텀 버튼 위젯
 * 
 * @(#)CustomButton.java
 * @ Copyright 2011 GRLab Corporation. All rights reserved.
 * 
 * @since        : 2011. 6. 21.
 * @author       : kim.sh
 */
public class CustomButton extends Button {

	/**
	 * CustomButton.java 생성자
	 * @param context 컨텍스트
	 * @param defaultImgId 기본 이미지
	 * @param clicekdImgId 클릭 이미지
	 * @param defaultTextColor 기본 텍스트 컬러
	 * @param clickedTextColor 클릭 텍스트 컬러
	 */
	public CustomButton(Context context, int defaultImgId, int clicekdImgId, 
			int defaultTextColor, int clickedTextColor) {
		super(context);
		// 이미지리소스 ID(R.drawable.xxx)로 부터 디폴트Drawable 객체와 클릭Drwable 취득
		Drawable defaultImg = context.getResources().getDrawable(defaultImgId);
		Drawable clickedImg = context.getResources().getDrawable(clicekdImgId);
		// backgournd 속성 설정
		setBackgroundAttributes(defaultImg, clickedImg);
		// textColor 속성 설정
		setTextColorAttributes(defaultTextColor, clickedTextColor);
	}

	/**
	 * CustomButton.java 생성자
	 * @param context 컨텍스트
	 * @param attrs 어트리뷰트셋
	 */
	public CustomButton(Context context, AttributeSet attrs) {
		super(context, attrs);
		// 속성 컬렉션 TypedArray 취득
		TypedArray tArr = context.obtainStyledAttributes(attrs, R.styleable.custom_button);
		
		// 디폴트 배경이미지ID와 클릭 배경이미지ID 를 가지고 있을때만 background속성값으로 설정
		if (tArr.hasValue(R.styleable.custom_button_defaultImgId) 
				&& tArr.hasValue(R.styleable.custom_button_clickedImgId)) {
			// 디폴트 배경이미지ID와 클릭 배경이미지ID로 부터 Drawable객체 취득
			Drawable defaultImg = tArr.getDrawable(R.styleable.custom_button_defaultImgId);
			Drawable clickedImg = tArr.getDrawable(R.styleable.custom_button_clickedImgId);
			
			setBackgroundAttributes(defaultImg, clickedImg);
		}
		
		if (tArr.hasValue(R.styleable.custom_button_defaultTextColor)
				&& tArr.hasValue(R.styleable.custom_button_clickedTextColor)) {
			// 문자열 색상값 취득
			int defaultTextColor = tArr.getColor(R.styleable.custom_button_defaultTextColor, 0);
			int clickedTextColor = tArr.getColor(R.styleable.custom_button_clickedTextColor, 0);
			setTextColorAttributes(defaultTextColor, clickedTextColor);
		}
	}
	
	/**
	 * 버튼 배경 어트리뷰트 설정(ON/OFF 이미지 설정)
	 * @param defaultImg 기본 이미지
	 * @param clickedImg 클릭 이미지
	 */
	private void setBackgroundAttributes(Drawable defaultImg, Drawable clickedImg) {
		StateListDrawable sld = new StateListDrawable();
		// 상태값 배열과, 이미지를 1:1로 설정
		sld.addState(new int[]{android.R.attr.state_pressed }, clickedImg);
		sld.addState(new int[]{ -android.R.attr.state_focused },defaultImg);
		this.setBackgroundDrawable(sld);
	}
	
	/**
	 * 버튼 텍스트 컬러 어트리뷰트 설정(ON/OFF 텍스트 컬러 설정)
	 * @param defaultTextColor 기본 텍스트 컬러
	 * @param clickedTextColor 클릭 텍스트 컬러
	 */
	private void setTextColorAttributes (int defaultTextColor, int clickedTextColor) {
	    // 상태값을 이중 배열에 설정
	    // 여러 상태를 묶어서 설정하기 위해 이중 배열을 사용
		int states[][] = new int[][]{{android.R.attr.state_pressed}, {-android.R.attr.state_focused}};
	    // 상태값 순서에 맞게 색상값을 설정
		int colors[] =new int[]{clickedTextColor, defaultTextColor};
        ColorStateList csl = new ColorStateList(states,colors);
        this.setTextColor(csl);
	}
}
