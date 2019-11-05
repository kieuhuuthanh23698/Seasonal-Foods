package com.example.acer_pc.seasonalfoods.Activity;

import Adapter.lvLoaiSP_Home;
import Adapter.lvLoaiSP_Menu;
import Objects.LoaiSanPham;

import android.support.design.widget.NavigationView;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.Gravity;
import android.view.View;
import android.widget.ListView;
import android.support.v7.widget.Toolbar;
import android.widget.Toast;

import com.example.acer_pc.seasonalfoods.R;

import java.util.ArrayList;

public class homeActivity extends AppCompatActivity {

    Toolbar toolbar;
    ListView lvLoaiSanPham, lvMenu;
    NavigationView navMenu;
    DrawerLayout drawerLayout;
    String[] lsLoaiSp_menu = new String[]{"Trái Cây", "Rau Củ", "Thảo Dược Thiên Nhiên", "Hải Sản", "Sản Phẩm Khác"};
    ArrayList<LoaiSanPham> lsLoaiSp;
    
    private void InitData(){
        lsLoaiSp = new ArrayList<LoaiSanPham>();
        for (int i = 0; i < lsLoaiSp_menu.length; i++)
        {
            LoaiSanPham item = new LoaiSanPham(lsLoaiSp_menu[i],null);
            lsLoaiSp.add(item);
        }
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);
        FindView();
        ActionBar();
        InitData();

        lvLoaiSP_Menu adapMenu = new lvLoaiSP_Menu(homeActivity.this,lsLoaiSp_menu);
        lvMenu.setAdapter(adapMenu);

        lvLoaiSP_Home adapHome = new lvLoaiSP_Home(homeActivity.this,lsLoaiSp);
        lvLoaiSanPham.setAdapter(adapHome);
    }

    private void FindView() {
        toolbar = findViewById(R.id.toolBar);
        lvLoaiSanPham = findViewById(R.id.loaiSanPham);
        lvMenu = findViewById(R.id.loaiSanPhamMenu);
        navMenu = findViewById(R.id.naviMenu);
        drawerLayout = findViewById(R.id.drawerLayout);
    }

    private void ActionBar(){
        setSupportActionBar(toolbar);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        toolbar.setNavigationIcon(R.drawable.ic_menu_black_24dp);
        toolbar.setNavigationOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                drawerLayout.openDrawer(Gravity.START);
            }
        });
    }

}
