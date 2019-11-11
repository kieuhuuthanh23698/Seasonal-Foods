package com.example.acer_pc.seasonalfoods.Activity;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;

import com.example.acer_pc.seasonalfoods.R;

import de.hdodenhof.circleimageview.CircleImageView;

public class activity_register extends AppCompatActivity {

    CircleImageView img_gender;
    int gender = 0;// 0 : man | 1 : woman

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);
        img_gender = findViewById(R.id.gender);
        //thay đổi giá trị của gender và thay hình ảnh
        img_gender.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(gender == 0)
                {
                    gender = 1;
                    img_gender.setImageResource(R.drawable.woman);
                }
                else
                {
                    gender = 0;
                    img_gender.setImageResource(R.drawable.man);
                }
            }
        });
    }
}
