package com.example.acer_pc.customlistview2;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.ImageView;
import android.widget.ListAdapter;
import android.widget.Toast;

import java.io.IOException;
import java.util.List;

import okhttp3.Call;
import okhttp3.Callback;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.Response;
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

public class DetailItem extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main2);
        Intent data = getIntent();
        String item = "";
        item = data.getStringExtra("item");
        ImageView imgView = findViewById(R.id.imageView2);
        DownLoadImageTask a = new DownLoadImageTask(imgView);
        a.execute(item);
//
//        System.setProperty("http.proxyHost", "my.proxyhost.com");
//        System.setProperty("http.proxyPort", "1234");

//        //Cách 1
//        Retrofit retrofit = new Retrofit
//                .Builder()
//                .baseUrl("http://172.19.200.248:8080/SeasonalFoods2/API/addFoods")
//                .addConverterFactory(GsonConverterFactory.create())
//                .build();
//
//        JsonPlaceHolderApi jsonPlaceHolderApi = retrofit.create(JsonPlaceHolderApi.class);
//        retrofit2.Call<List<Post>> call = jsonPlaceHolderApi.getPost();
//        call.enqueue(new retrofit2.Callback<List<Post>>() {
//            @Override
//            public void onResponse(retrofit2.Call<List<Post>> call, retrofit2.Response<List<Post>> response) {
//                if(!response.isSuccessful()) {
//                    Toast.makeText(DetailItem.this, "Response : " + response.code(), Toast.LENGTH_LONG);
//                    return;
//                }
//            }
//
//            @Override
//            public void onFailure(retrofit2.Call<List<Post>> call, Throwable t) {
//                Toast.makeText(DetailItem.this,t.toString(),Toast.LENGTH_LONG);
//            }
//        });
//
//


        //Cách 2
        OkHttpClient client = new OkHttpClient();
        String url = "http://172.19.200.248:8080/SeasonalFoods2/API/getFoods";
        Request request = new Request.Builder().url(url).build();
        client.newCall(request).enqueue(new Callback() {
            @Override
            public void onFailure(Call call, IOException e) {
                Toast.makeText(DetailItem.this,e.toString(),Toast.LENGTH_LONG);
            }

            @Override
            public void onResponse(Call call, Response response) throws IOException {
                    if(response.isSuccessful())
                    {
                        Toast.makeText(DetailItem.this,response.body().string(),Toast.LENGTH_LONG);
                    }
            }
        });
    }
}
