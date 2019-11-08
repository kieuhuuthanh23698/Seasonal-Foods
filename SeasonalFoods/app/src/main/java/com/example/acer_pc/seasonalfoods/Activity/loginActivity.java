package com.example.acer_pc.seasonalfoods.Activity;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.example.acer_pc.seasonalfoods.R;

import Data.DAL;

public class loginActivity extends AppCompatActivity {

    EditText edtUsername, edtPass;
    Button btnDangnhap;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        edtUsername = findViewById(R.id.txt_dn);
        edtPass = findViewById(R.id.txt_mk);
        btnDangnhap = findViewById(R.id.button);
        btnDangnhap.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(edtUsername.getText().toString().isEmpty() || edtPass.getText().toString().isEmpty())
                {
                    Toast.makeText(loginActivity.this,"Thông tin không đầy đủ",Toast.LENGTH_LONG).show();
                }
                else
                {
                    DAL dal =new DAL(loginActivity.this);
                    if(dal.login(edtUsername.getText().toString(),edtPass.getText().toString()).isEmpty())
                    {
                        Toast.makeText(loginActivity.this,"Đăng nhập thất bại",Toast.LENGTH_LONG).show();
                    }
                    else {
                        Intent intent = new Intent(loginActivity.this,homeActivity.class);
                        startActivityForResult(intent, 100);
                    }
                }
            }
        });
    }

}
