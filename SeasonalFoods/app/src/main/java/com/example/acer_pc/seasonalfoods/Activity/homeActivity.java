package com.example.acer_pc.seasonalfoods.Activity;

import Adapter.lvLoaiSP_Home;
import Adapter.lvLoaiSP_Menu;
import Data.DAL;
import Objects.CT_GioHang;
import Objects.LoaiSanPham;

import android.support.design.widget.NavigationView;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.Gravity;
import android.view.MotionEvent;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListView;
import android.support.v7.widget.Toolbar;
import android.widget.TextView;
import android.widget.Toast;

import com.example.acer_pc.seasonalfoods.R;

import java.util.ArrayList;

public class homeActivity extends AppCompatActivity {

    DAL dal;
    String idKH;
    ArrayList<CT_GioHang> gioHangs;

    TextView trangchu, thongtintaikhoang, doimatkhau, donhangcuaban, dangnhap, dangxuat, taotaikhoang;

    Toolbar toolbar;
    TextView soLuongGioHang;
    ListView lvLoaiSanPham, lvMenu;
    NavigationView navMenu;
    DrawerLayout drawerLayout;
    String[] lsLoaiSp_menu;
    ArrayList<LoaiSanPham> lsLoaiSp;
    
    private void InitData(){
        lsLoaiSp_menu = new String[]{"Trái Cây", "Rau Củ", "Thảo Dược Thiên Nhiên", "Hải Sản", "Sản Phẩm Khác"};
        lsLoaiSp = new ArrayList<LoaiSanPham>();
        for (int i = 0; i < lsLoaiSp_menu.length; i++)
        {
            LoaiSanPham item = new LoaiSanPham(lsLoaiSp_menu[i],dal.getSanPham_TheoLoai(i + ""));
            lsLoaiSp.add(item);
        }
    }

    private void ktraLogin(){
        //nếu có thông tin đăng nhập trong local thì request lên server
        String[] login = this.dal.getLogin();
        this.idKH = "";
        if(login != null)
        {
            //nếu result là true thì
            this.idKH = this.dal.login(login[0],login[1]);
            if(this.idKH != "")
            {
                //name và pass lưu trong local hợp lệ, đăng nhập từ động
                //ẩn TEXTVIEW đăng nhập, tạo tài khoảng
                thongtintaikhoang.setVisibility(View.VISIBLE);
                doimatkhau.setVisibility(View.VISIBLE);
                donhangcuaban.setVisibility(View.VISIBLE);
                dangxuat.setVisibility(View.VISIBLE);
                Toast.makeText(this,this.idKH, Toast.LENGTH_LONG).show();
            }
        }
        else
        {
            //nếu không có thì bắt buộc nhập
            dangnhap.setVisibility(View.VISIBLE);
            taotaikhoang.setVisibility(View.VISIBLE);
            Toast.makeText(this,"KHÔNG TÌM THẤY THÔNG TIN LOGIN ĐÃ LƯU", Toast.LENGTH_LONG).show();
        }
    }

    private void loadGioHangs(){
        if(this.gioHangs == null)
            this.gioHangs = new ArrayList<>();
        dal.loadGioHang(this.gioHangs);
        if(this.gioHangs.size() > 0)
        {
            this.soLuongGioHang.setText(this.gioHangs.size() + "");
            this.soLuongGioHang.setVisibility(View.VISIBLE);
        }
        else
        {
            this.soLuongGioHang.setText("0");
            this.soLuongGioHang.setVisibility(View.GONE);
        }
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);
        this.dal = new DAL(this);
        FindView();
        ActionBar();
        InitData();
        ktraLogin();
        loadGioHangs();
        lvLoaiSP_Menu adapMenu = new lvLoaiSP_Menu(homeActivity.this,lsLoaiSp_menu);
        lvMenu.setAdapter(adapMenu);

        final lvLoaiSP_Home adapHome = new lvLoaiSP_Home(homeActivity.this,lsLoaiSp);
        lvLoaiSanPham.setAdapter(adapHome);
        lvMenu.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> adapterView, View view, int i, long l) {
                lvLoaiSanPham.setSelection(i);
//                drawerLayout.openDrawer(Gravity.NO_GRAVITY);
            }
        });
    }

    private void FindView() {
        toolbar = findViewById(R.id.toolBar);
        soLuongGioHang = findViewById(R.id.soLuongGioHang);
        lvLoaiSanPham = findViewById(R.id.loaiSanPham);
        lvMenu = findViewById(R.id.loaiSanPhamMenu);
        navMenu = findViewById(R.id.naviMenu);
        drawerLayout = findViewById(R.id.drawerLayout);

        trangchu = findViewById(R.id.trangchu);
        thongtintaikhoang = findViewById(R.id.thongtintaikhoang);
        doimatkhau = findViewById(R.id.doimatkhau);
        donhangcuaban = findViewById(R.id.donhang);
        dangnhap = findViewById(R.id.dangnhap);
        dangxuat = findViewById(R.id.dangxuat);
        taotaikhoang = findViewById(R.id.taotaikhoang);
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
