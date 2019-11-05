package com.example.acer_pc.customlistview2;

import android.content.Intent;
import android.os.CountDownTimer;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.GridView;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.concurrent.ExecutionException;

public class Menu extends AppCompatActivity implements View.OnClickListener {

    Button btnGrid;
    Button btnList;
    ArrayList list;
    ListView lv;
    GridView gv;
    int i = 0;

    String ip = "http://172.19.200.248:8080";
    //String ip = "http://172.19.200.248:8080";
    //String ip = "http://172.19.200.248:8080";

    @Override
    protected void onCreate(Bundle savedInstanceState) {

        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        update();

        btnGrid = findViewById(R.id.btngridView);
        btnList = findViewById(R.id.btnlistView);
        try {
            list = initData();
        } catch (ExecutionException e) {
            e.printStackTrace();
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
        lv = findViewById(R.id.listView);
        gv = findViewById(R.id.gridview);

        ImagesAdapterListView imgAdap = new ImagesAdapterListView(this, list);
        lv.setAdapter(imgAdap);
        lv.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> adapterView, View view, int i, long l) {
                Image item = (Image) adapterView.getItemAtPosition(i);
                Intent data = new Intent(Menu.this,DetailItem.class);
                data.putExtra("item", item.urlImage);
                startActivity(data);
            }
        });

        ImagesAdapterGridView imgAdap2 = new ImagesAdapterGridView(this, list);
        gv.setAdapter(imgAdap2);
        gv.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> adapterView, View view, int i, long l) {
                Image item = (Image) adapterView.getItemAtPosition(i);
                Intent data = new Intent(Menu.this,DetailItem.class);
                data.putExtra("item", item.urlImage);
                startActivity(data);
            }
        });

        btnGrid.setOnClickListener(this);
        btnList.setOnClickListener(this);
    }

    @Override
    public void onClick(View view) {
        switch (view.getId())
        {
            case R.id.btngridView:
                lv.setVisibility(View.GONE);
                gv.setVisibility(View.VISIBLE);
                break;
            case R.id.btnlistView:
                gv.setVisibility(View.GONE);
                lv.setVisibility(View.VISIBLE);
                break;
        }
    }

    private CountDownTimer countDownTimer = new CountDownTimer(10,1000)     {
        @Override
        public void onTick(long l) {
            update();
        }

        @Override
        public void onFinish() {

        }
    }.start();

    public void update()
    {
        Toast.makeText(this, "Update : " + i,Toast.LENGTH_SHORT).show();
        i++;
    }

    public ArrayList<Image> initData() throws ExecutionException, InterruptedException {
        ArrayList<Image> list;
        ParseJSONSimple parseJSONSimple = new ParseJSONSimple(this,ip);

        parseJSONSimple.execute(ip + "/SeasonalFoods2/API/getFoods");
        list = parseJSONSimple.get();
        Toast.makeText(this,"Load " + list.size() + " item !", Toast.LENGTH_LONG).show();
        return list;
    }
}
