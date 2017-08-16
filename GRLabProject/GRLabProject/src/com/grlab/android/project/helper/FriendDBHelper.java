package com.grlab.android.project.helper;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

/**
 * 친구정보  DB헬퍼 클래스
 * 
 * @(#)FriendDBHelper.java
 * @ Copyright 2011 GRLab Corporation. All rights reserved.
 * 
 * @since        : 2011. 5. 18.
 * @author       : 11A017023
 */
public class FriendDBHelper extends SQLiteOpenHelper {

	/**
	 * FreindReceiver.java 생성자
	 * @param context 컨텍스트
	 */
	public FriendDBHelper(Context context) {
		
		// 친구정보DB생성
		super(context, "FriendInfo.db", null, 1);
	}

	/* (non-Javadoc)
	 * @see android.database.sqlite.SQLiteOpenHelper#onCreate(android.database.sqlite.SQLiteDatabase)
	 */
	@Override
	public void onCreate(SQLiteDatabase db) {
		//Table 생성
		// _id : PK
		// phone_no : 전화번호
		// reg_id1 : C2DM 등록ID1
		// reg_id2 : C2DM 등록ID2
		db.execSQL("CREATE TABLE friend_reg_id ( _id INTEGER PRIMARY KEY AUTOINCREMENT, " +
		"phone_no TEXT, reg_id1 TEXT, reg_id2 TEXT);");
	}
	/* (non-Javadoc)
	 * @see android.database.sqlite.SQLiteOpenHelper#onUpgrade(android.database.sqlite.SQLiteDatabase, int, int)
	 */
	@Override
	public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
		db.execSQL("DROP TABLE IF EXISTS friend_reg_id");
		onCreate(db);
	}

}
