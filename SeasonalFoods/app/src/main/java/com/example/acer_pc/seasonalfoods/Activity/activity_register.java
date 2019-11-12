package com.example.acer_pc.seasonalfoods.Activity;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.Editable;
import android.text.TextWatcher;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.example.acer_pc.seasonalfoods.R;

import Data.DataAccessLayer;
import de.hdodenhof.circleimageview.CircleImageView;

public class activity_register extends AppCompatActivity {

    CircleImageView img_gender;
    int gender = 0;// 0 : man | 1 : woman
    EditText edtHoTen, edtSDT, edtEmail, edtTenDN, edtMK, edtMKa;
    Button btnDK;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);
        img_gender = findViewById(R.id.gender);
        edtHoTen = findViewById(R.id.txt_name);
        edtSDT = findViewById(R.id.txt_sdt);
        edtEmail = findViewById(R.id.txt_email);
        edtTenDN = findViewById(R.id.txt_dnsign);
        edtMK = findViewById(R.id.txt_mksign);
        edtMKa = findViewById(R.id.txt_mksignagain);
        btnDK = findViewById(R.id.buttonttsign);
        //thay đổi giá trị của gender và thay hình ảnh
        img_gender.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (gender == 0) {
                    gender = 1;
                    img_gender.setImageResource(R.drawable.woman);
                } else {
                    gender = 0;
                    img_gender.setImageResource(R.drawable.man);
                }
                if (edtHoTen.getText().toString().isEmpty() || edtSDT.getText().toString().isEmpty() || edtEmail.getText().toString().isEmpty() || edtTenDN.getText().toString().isEmpty() || edtMK.getText().toString().isEmpty() || edtMKa.getText().toString().isEmpty())
                    {
                        Toast.makeText(activity_register.this, "Thông tin không đầy đủ", Toast.LENGTH_LONG).show();
                    }
                else
                    {
                        DataAccessLayer dal =new DataAccessLayer(activity_register.this);
                        Toast.makeText(activity_register.this, "Đăng ký thành công", Toast.LENGTH_LONG).show();
                        Intent intent = new Intent(activity_register.this,loginActivity.class);
                        startActivityForResult(intent, 100);
                    }
            }

        });
        edtMKa.addTextChangedListener(new TextWatcher() {
            @Override
            public void beforeTextChanged(CharSequence charSequence, int i, int i1, int i2) {

            }

            @Override
            public void onTextChanged(CharSequence charSequence, int i, int i1, int i2) {

            }

            @Override
            public void afterTextChanged(Editable editable) {
                if (edtMK.getText().toString() == edtMKa.getText().toString()) {
                    Toast.makeText(activity_register.this, "Nhập lại mật khẩu không đúng", Toast.LENGTH_LONG).show();
                }
            }
        });
    }
}
