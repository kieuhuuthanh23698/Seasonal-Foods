package com.example.acer_pc.seasonalfoods.Activity;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.EditText;
import android.widget.RadioButton;

import com.example.acer_pc.seasonalfoods.R;

public class signUpActivity extends AppCompatActivity {
    EditText edttendn, edthoten, edtemail, edtsdt, edtns, edtcmnd, edtdiachi;
    RadioButton rdonam, rdonu;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_sign_up);
        edttendn = findViewById(R.id.txt_tendn);
        edthoten = findViewById(R.id.txt_name);
        edtemail = findViewById(R.id.txt_email);
        edtsdt = findViewById(R.id.txt_sdt);
        edtns = findViewById(R.id.txt_birth);
        edtcmnd = findViewById(R.id.txt_cmnd);
        edtdiachi = findViewById(R.id.txt_diachi);
        rdonam = findViewById(R.id.rbt_male);
        rdonu = findViewById(R.id.rbt_female);
    }
}
