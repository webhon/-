/**
 * 
 */
package com.grlab.android.project.util;

import java.io.FileNotFoundException;

import android.content.Context;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.graphics.Matrix;
import android.net.Uri;

/**
 * 유틸 클래스
 * 
 * @(#)Util.java
 * @ Copyright 2011 GRLab Corporation. All rights reserved.
 * 
 * @since        : 2011. 6. 8.
 * @author       : kim.sh
 */
public class Util {
	/**
	 * 이미지 사이즈 변환
	 *
	 * @param Context context 컨텍스트
	 * @param Bitmap inBtm 원본사이즈
	 * @param int resizeWith 리사이즈 가로넓이
	 * @param int resizeHight 리사이즈 세로넓이
	 * 
	 * @return Bitmap 변환 후 이미지 비트맵
	 */
	public static Bitmap resizeImage(Context context, Bitmap inBtm, int resizeWith, int resizeHight) {
		
		int width = inBtm.getWidth();
		int height = inBtm.getHeight();
		int newWidth = resizeWith;
		int newHeight = resizeHight;
		
		float scaleWidth = ((float) newWidth) / width; 
		float scaleHeight = ((float) newHeight) / height; 

		
		Matrix matrix = new Matrix(); 
		matrix.postScale(scaleWidth, scaleHeight); 

		
		return Bitmap.createBitmap(inBtm, 0, 0, width,  height, matrix, true); 
	}
	
	/**
	 * Uri를 비트맵 이미지로 변환
	 *
	 * @param Context context 컨텍스트
	 * @param Uri inUri
	 * 
	 * @return Bitmap 변환 후 이미지 비트맵
	 */
	public static Bitmap uriToBitmap(Context context, Uri inUri) {
		Bitmap bm = null;
		try {
			bm = BitmapFactory.decodeStream(context.getContentResolver().openInputStream(inUri), null, new BitmapFactory.Options());
		} catch (FileNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return bm;
	}
	
	/**
	 * 이미지 정 사이즈 변환
	 *
	 * @param Context context 컨텍스트
	 * @param Bitmap inBtm 원본사이즈
	 * @param int resizeWith 리사이즈 가로넓이
	 * @param int resizeHight 리사이즈 세로넓이
	 * 
	 * @return Bitmap 변환 후 이미지 비트맵
	 */
	public static Bitmap resizeScaledImage(Context context, Bitmap inBtm, int resizeWidth, int resizeHeight) {
		
		Bitmap reBitmap = null;
		
		if (inBtm.getWidth() < inBtm.getHeight()) {
		
			Matrix matrix = new Matrix();
			matrix.postRotate(90);
			reBitmap = Bitmap.createBitmap(inBtm, 0, 0, inBtm.getWidth(), inBtm.getHeight(), matrix, true); 
		
		} else {
			reBitmap = inBtm;
		} 
		
		double currentWidth = reBitmap.getWidth();
		double currentHeight = reBitmap.getHeight();
		
		
		int dstWidth = 0;
		int dstHeight = 0;
		
		Bitmap outBtm = null;
	
		if (currentWidth > resizeWidth && currentHeight > resizeHeight) {
			if (currentWidth >= currentHeight) {
				dstWidth = resizeWidth;
				dstHeight = (int)(resizeWidth * (currentHeight / currentWidth));
			} else {
				dstHeight = resizeHeight;
				dstWidth = (int)(resizeHeight * (currentWidth / currentHeight));
			}
			outBtm = Bitmap.createScaledBitmap(reBitmap, dstWidth, dstHeight, true);
		} else {
			outBtm = reBitmap;
		}
		
		return outBtm; 
	}
	
}
