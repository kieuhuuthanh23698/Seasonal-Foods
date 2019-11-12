package com.example.acer_pc.seasonalfoods.Activity;

import android.annotation.SuppressLint;
import android.content.Intent;
import android.os.Build;
import android.support.annotation.RequiresApi;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.InputType;
import android.view.Gravity;
import android.view.MotionEvent;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;
import android.support.v7.widget.Toolbar;
import com.example.acer_pc.seasonalfoods.R;
import Data.DataAccessLayer;
import Data.DB_Helper;

import static android.text.InputType.TYPE_CLASS_TEXT;
import static android.text.InputType.TYPE_TEXT_VARIATION_PASSWORD;
import static android.text.InputType.TYPE_TEXT_VARIATION_VISIBLE_PASSWORD;

public class loginActivity extends AppCompatActivity {

    Toolbar toolbar;
    EditText edtUsername, edtPass;
    Button btnDangnhap;
    TextView register;
    boolean show = false;

    @RequiresApi(api = Build.VERSION_CODES.LOLLIPOP)
    @SuppressLint("ClickableViewAccessibility")
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        edtUsername = findViewById(R.id.txt_dn);
        edtPass = findViewById(R.id.txt_mk);
        btnDangnhap = findViewById(R.id.button);
        toolbar = findViewById(R.id.toolBar);
        toolbar.setNavigationOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(loginActivity.this, homeActivity.class);
                startActivity(intent);
            }
        });

        btnDangnhap.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(edtUsername.getText().toString().isEmpty() || edtPass.getText().toString().isEmpty())
                {
                    Toast.makeText(loginActivity.this,"Thông tin không đầy đủ",Toast.LENGTH_LONG).show();
                }
                else
                {
                    DataAccessLayer dal =new DataAccessLayer(loginActivity.this);
                    if(dal.login(edtUsername.getText().toString(),edtPass.getText().toString()).isEmpty())
                    {
                        Toast.makeText(loginActivity.this,"Đăng nhập thất bại",Toast.LENGTH_LONG).show();
                    }
                    else {
                        //lưu thông tin vào local
                        Intent intent = new Intent(loginActivity.this,homeActivity.class);
                        startActivityForResult(intent, 100);
                    }
                }
            }
        });



        edtPass.setOnTouchListener(new View.OnTouchListener() {
            @SuppressLint("ClickableViewAccessibility")
            @Override
                public boolean onTouch(View view, MotionEvent event) {
                    if(event.getAction() == MotionEvent.ACTION_UP) {
                        if(edtPass.getCompoundDrawables()[2]!=null){
                            if(event.getX() >= (edtPass.getRight()- edtPass.getLeft() - edtPass.getCompoundDrawables()[2].getBounds().width())) {
                                show = !show;
                                if(show)
                                {
                                    edtPass.setInputType(TYPE_CLASS_TEXT | TYPE_TEXT_VARIATION_VISIBLE_PASSWORD);
                                    edtPass.setCompoundDrawablesRelativeWithIntrinsicBounds(0,0,R.drawable.ic_visibility_black_24dp, 0);
                                }
                                else {
                                    edtPass.setInputType(TYPE_CLASS_TEXT | TYPE_TEXT_VARIATION_PASSWORD);
                                    edtPass.setCompoundDrawablesRelativeWithIntrinsicBounds(0,0,R.drawable.ic_visibility_off_black_24dp, 0);
                                }
                            }
                        }
                    }
                    return false;
                }
            });

        register = findViewById(R.id.register);
        register.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(loginActivity.this,activity_register.class);
                startActivityForResult(intent, 100);
            }
        });
    }

}
