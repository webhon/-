/**
 * 
 */
package com.grlab.android.project.screen;

import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;

import org.json.JSONException;
import org.json.JSONObject;

import android.app.Activity;
import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.DialogInterface.OnDismissListener;
import android.graphics.Bitmap;
import android.graphics.Bitmap.CompressFormat;
import android.os.AsyncTask;
import android.os.Bundle;
import android.os.Environment;
import android.provider.MediaStore;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.EditText;

import com.grlab.android.project.R;
import com.grlab.android.project.constant.KeyInfo;
import com.grlab.android.project.util.FacebookController;
import com.grlab.android.project.util.Util;

/**
 * SNS포스트 화면
 * 
 * @(#)FacebookPost.java
 * @ Copyright 2011 GRLab Corporation. All rights reserved.
 * 
 * @since        : 2011. 5. 21.
 * @author       : kim.sh
 */
public class FacebookPost extends Activity {

	/**
	 * 요청코드(사진선택)
	 */
	private static final int REQ_CODE_PICK_PICTURE = 1;
	/**
	 * 요청코드(카메라촬영)
	 */
	private static final int REQ_CODE_IMAGE_CAPTURE = 2;
	/**
	 * 업로드 모드(이미지 없음)
	 */
	public static final int UPLOAD_MODE_NO_IMAGE = 0;
	/**
	 * 업로드 모드(파일 이미지)
	 */
	public static final int UPLOAD_MODE_FILE_IMAGE = 1;
	/**
	 * 인증토큰
	 */
	private String accessToken;
	/**
	 * 리스트 다이얼로그 인덱스ID
	 */
	private int listDialogId = -1;
	/**
	 * 사진이미지 비트맵
	 */
	private Bitmap photoImage;
	/**
	 * 사진 업로드 체크박스
	 */
	private CheckBox photoUploadCheck;
	/**
	 * 사진 선택 모드 다이얼로그
	 */
	private AlertDialog dialog;
	/**
	 * 사진 선택 모드 다이얼로그 빌더
	 */
	private AlertDialog.Builder ab;
	/**
	 * 페이스북 메시지 입력 에디트텍스트
	 */
	private EditText fbEditText;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.screen_facebook_post);
		// 페이스북 인증 화면에서 SharedPreferences에 저장한 인증키를 취득
		SharedPreferences sp = getSharedPreferences(
				KeyInfo.SP_NAME_FACEBOOK_INFO, MODE_PRIVATE);
		accessToken = sp.getString(KeyInfo.SP_KEY_FACEBOOK_ACCESS_TOKEN, null);
		// 인증키가 존재하지 않을 경우, 경고창 출력 후, 페이스북 인증 화면으로 이동
		if (accessToken == null) {
			AlertDialog.Builder ab = new AlertDialog.Builder(this);
			ab.setPositiveButton(R.string.confirm, null);
			ab.setMessage(getString(R.string.sns_post_move_auth));
			ab.show().setOnDismissListener(new OnDismissListener() {

				@Override
				public void onDismiss(DialogInterface dialog) {
					Intent intent = new Intent(FacebookPost.this,
							FacebookAuth.class);
					startActivity(intent);
				}
			});
		}
		setViewElements();
	}

	/**
	 * 화면 뷰 설정
	 */
	private void setViewElements() {
		fbEditText = (EditText) findViewById(R.id.facebookEditText);
		photoUploadCheck = (CheckBox) findViewById(R.id.facebookPhtoUpload);
		Button fbPost = (Button) findViewById(R.id.facebookPost);
		// 사진 업로드 체크박스 클릭 이벤트
		photoUploadCheck.setOnClickListener(new OnClickListener() {

			@Override
			public void onClick(View v) {
				// 체크되었을 경우, 사진 선택 모드 다이얼로그 출력
				if (photoUploadCheck.isChecked()) {
					handleShowListDialog();
				} else {
					photoImage = null;
				}

			}
		});
		// 포스트 버튼 클릭 이벤트
		fbPost.setOnClickListener(new OnClickListener() {

			@Override
			public void onClick(View v) {
				// SharedPreferences로 부터 인증키 취득
				SharedPreferences sp = getSharedPreferences(
						KeyInfo.SP_NAME_FACEBOOK_INFO, MODE_PRIVATE);
				accessToken = sp.getString(
						KeyInfo.SP_KEY_FACEBOOK_ACCESS_TOKEN, null);
				// 인증키가 존재할 경우,
				if (accessToken != null && accessToken.length() > 0) {
					// 사진업로드 체크박스가 체크되어있고, 사진 이미지 객체가 null이 아닐 경우
					if (photoUploadCheck.isChecked() && photoImage != null) {
						// 업로드 모드를 "파일 이미지"로 설정하여 입력한 글과 선택한 사진을 페이스북에 업로드
						new FacebookAsyncTask(createImageFile(),
								UPLOAD_MODE_FILE_IMAGE, accessToken)
								.execute(fbEditText.getText().toString());
					} else {
						// 업로드 모드를 "이미지 없음"으로 설정하여 입력한 글만 페이스북에 업로드
						new FacebookAsyncTask(UPLOAD_MODE_NO_IMAGE, accessToken)
								.execute(fbEditText.getText().toString());
					}
				} else {
					// 인증키가 존재하지 않을 경우, 페이스북 인증 화면으로 이동
					Intent intent = new Intent(FacebookPost.this,
							FacebookAuth.class);
					startActivity(intent);
				}
			}
		});
	}

	/**
	 * 이미지 파일 생성
	 * @return file
	 */
	private File createImageFile() {
		// Bitmap이미지 객체를 파일로 변환
		File file = new File(Environment.getExternalStorageDirectory()
				.getPath(), "/temp.jpg");
		try {
			photoImage.compress(CompressFormat.JPEG, 70, new FileOutputStream(
					file));
		} catch (FileNotFoundException e) {
			e.printStackTrace();
		}
		return file;
	}

	/**
	 * 사진 선택 모드 다이얼로그 처리
	 */
	private void handleShowListDialog() {
		// 사진 선택 모드 다이얼로그를 출력
		ab = new AlertDialog.Builder(this);
		ab.setTitle(R.string.sns_post_image_select);
		ab.setSingleChoiceItems(R.array.string_array_choice_picture,
				listDialogId, new DialogInterface.OnClickListener() {

					@Override
					public void onClick(DialogInterface dialog, int which) {
						Intent intent = new Intent();
						switch (which) {
						// 인덱스가 0일 경우, 암시적 인텐트를 이용하여 갤러리 어플리케이션을 호출
						case 0:
							intent.setAction(Intent.ACTION_PICK);
							intent
									.setType(android.provider.MediaStore.Images.Media.CONTENT_TYPE);
							intent
									.setData(android.provider.MediaStore.Images.Media.EXTERNAL_CONTENT_URI);
							startActivityForResult(intent,
									REQ_CODE_PICK_PICTURE);
							listDialogId = which;
							break;
						// 인덱스가 1일 경우, 암시적 인텐트를 이용하여 카메라 어플리케이션을 호출
						case 1:
							intent.setAction(MediaStore.ACTION_IMAGE_CAPTURE);
							startActivityForResult(intent,
									REQ_CODE_IMAGE_CAPTURE);
							listDialogId = which;
							break;
						default:
							dialog.dismiss();
							break;
						}
					}
				});
		dialog = ab.show();
		dialog.setOnDismissListener(new OnDismissListener() {

			@Override
			public void onDismiss(DialogInterface dialog) {
				if (photoImage == null) {
					photoUploadCheck.setChecked(false);
				} else {
					photoUploadCheck.setChecked(true);
				}
			}
		});
	}

	/* (non-Javadoc)
	 * @see android.app.Activity#onActivityResult(int, int, android.content.Intent)
	 */
	@Override
	protected void onActivityResult(int requestCode, int resultCode, Intent data) {
		super.onActivityResult(requestCode, resultCode, data);
		// 암시적 인텐트를 이용하여 호출하였던 갤러리 어플리케이션과 카메라 어플리케이션 결과 값을 취득
		if (resultCode == Activity.RESULT_OK) {
			// 요청코드가 카메라 촬영일 경우, Extra로 부터 "data"를 키로
			// Object를 취득한 후 Bitmap으로 캐스팅하여 이미지 객체 취득
			if (requestCode == REQ_CODE_IMAGE_CAPTURE && data != null) {
				photoImage = (Bitmap) data.getExtras().get("data");
				// 요청코드가 갤러리 모드일 경우, getData()메소드를 사용, 이미지객체를 취득하여,
				// 리사이징 한 이미지 객체를 취득
			} else if (requestCode == REQ_CODE_PICK_PICTURE) {
				photoImage = Util.resizeScaledImage(this, Util.uriToBitmap(
						this, data.getData()), 600, 480);
			}
		}
		dialog.dismiss();
	}

	/**
	 * 페이스북 비동기 테스크
	 * 
	 * @since        : 2011. 5. 21.
	 * @author       : kim.sh
	 */
	private class FacebookAsyncTask extends AsyncTask<String, Integer, JSONObject> {
		private int uploadMode;
		private String accessToken;
		private File file;
		private ProgressDialog pd;

		public FacebookAsyncTask(int uploadMode, String accessToken) {
			this.uploadMode = uploadMode;
			this.accessToken = accessToken;
		}

		public FacebookAsyncTask(File file, int uploadMode, String accessToken) {
			this(uploadMode, accessToken);
			this.file = file;
		}

		@Override
		protected void onPreExecute() {
			pd = new ProgressDialog(FacebookPost.this);
			pd.setMessage(getString(R.string.please_wait));
			pd.setCancelable(true);
			pd.setOnDismissListener(new OnDismissListener() {

				@Override
				public void onDismiss(DialogInterface dialog) {
					cancel();
				}
			});
			pd.show();
		}

		private void cancel() {
			this.cancel(true);
		}

		@Override
		protected JSONObject doInBackground(String... params) {
			JSONObject jsonResult = null;
			String message = "";
			// execute()메서드의 인자로 전달받은 params의 첫번째 값을
			// 포스트할 메시지로 취득
			if (params != null && params.length > 0) {
				message = params[0];
			}
			// 업로드 모드가 파일 이미지일 경우,
			if (uploadMode == UPLOAD_MODE_FILE_IMAGE) {
				// 메시지와 이미지 파일과 인증키를 인자로 페이스북 업로드 메소드를 호출
				jsonResult = FacebookController.uploadMessageWithPhoto(message, file,
						accessToken);
			} else {
				// 업로드 모드가 이미지 없음일 경우, 메시지와 인증키를 인자로 페이스북 업로드 메소드를 호출
				jsonResult = FacebookController.uploadMessage(message,
						accessToken);
			}
			return jsonResult;
		}

		@Override
		protected void onPostExecute(JSONObject result) {
			if (pd != null) {
				pd.dismiss();
			}
			if (result == null) {
				new AlertDialog.Builder(FacebookPost.this).setMessage(
						R.string.sns_post_error_etc_msg).setPositiveButton(R.string.confirm, null)
						.show();
			} else {
				int statusCode = 0;
				String statusMessage = null;
				try {
					// 결과로 받은 JSONObject에서 상태코드와 상태 메시지를 취득
					statusCode = result.getInt(FacebookController.STATUS_CODE);
					statusMessage = result
							.getString(FacebookController.STATUS_MESSAGE);
				} catch (JSONException e) {
					e.printStackTrace();
				}
				// 상태코드가 정상일 경우,
				if (FacebookController.STATUS_CODE_OK == statusCode) {
					// 상태메시지 다이얼로그를 표시
					new AlertDialog.Builder(FacebookPost.this).setMessage(
							statusMessage).setPositiveButton(R.string.confirm, null).show();
					// 상태코드가 정상이 아닐 경우,
				} else {
					// 상태코드가 미인증일 경우,
					if (FacebookController.STATUS_CODE_UNAUTHORIZED == statusCode) {
						// 상태메시지 다이얼로그를 표시한 후 , 확인 버튼 선택시 페이스북 인증 화면으로 이동
						new AlertDialog.Builder(FacebookPost.this).setMessage(
								statusMessage).setPositiveButton(R.string.confirm,
								new DialogInterface.OnClickListener() {

									@Override
									public void onClick(DialogInterface dialog,
											int which) {
										Intent intent = new Intent(
												FacebookPost.this,
												FacebookAuth.class);
										startActivity(intent);
									}
								}).show();
					} else {
						// 상태코드가 미인증 이외의 비정상일 경우, 경고 다이얼로그 출력
						new AlertDialog.Builder(FacebookPost.this).setMessage(
								statusMessage).setPositiveButton(R.string.confirm, null)
								.show();
					}
				}
			}
			super.onPostExecute(result);
		}
	}
}
