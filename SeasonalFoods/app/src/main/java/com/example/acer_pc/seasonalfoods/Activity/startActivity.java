package com.example.acer_pc.seasonalfoods.Activity;

import android.content.Intent;
import android.os.Handler;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;

import com.example.acer_pc.seasonalfoods.R;

public class startActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_start);
        new Handler().postDelayed(new Runnable() {
            @Override
            public void run() {
                Intent homeAct = new Intent(startActivity.this, homeActivity.class);
                startActivity(homeAct);
                finish();
            }
        }, 3000);
    }
}
