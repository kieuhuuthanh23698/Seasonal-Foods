package com.example.acer_pc.seasonalfoods.Activity;

import Adapter.gridview_SP_Home;
import Adapter.lvLoaiSP_Home;
import Adapter.lvLoaiSP_Menu;
import Data.DataAccessLayer;
import Objects.CT_GioHang;
import Objects.LoaiSanPham;
import Objects.SanPham;

import android.content.Intent;
import android.support.design.widget.NavigationView;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.Editable;
import android.text.TextWatcher;
import android.util.Log;
import android.view.Gravity;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.BaseAdapter;
import android.widget.EditText;
import android.widget.GridView;
import android.widget.LinearLayout;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.support.v7.widget.Toolbar;
import android.widget.ScrollView;
import android.widget.TextView;
import android.widget.Toast;

import com.example.acer_pc.seasonalfoods.R;

import java.util.ArrayList;


class Helper {
    public static void getListViewSize(ListView myListView) {
        ListAdapter myListAdapter = myListView.getAdapter();
        if (myListAdapter == null) {
            //do nothing return null
            return;
        }
        //set listAdapter in loop for getting final size
        int totalHeight = 0;
        for (int size = 0; size < myListAdapter.getCount(); size++) {
            View listItem = myListAdapter.getView(size, null, myListView);
            listItem.measure(0, 0);
            totalHeight += listItem.getMeasuredHeight();
        }
        //setting listview item in adapter
        ViewGroup.LayoutParams params = myListView.getLayoutParams();
        params.height = totalHeight + (myListView.getDividerHeight() * (myListAdapter.getCount() - 1));
        myListView.setLayoutParams(params);
        // print height of adapter on log
        Log.i("height of listItem:", String.valueOf(totalHeight));
    }
}

public class homeActivity extends AppCompatActivity implements View.OnClickListener{

    DAL dal;
    String idKH;
    ArrayList<CT_GioHang> gioHangs;

    TextView trangchu, thongtintaikhoang, doimatkhau, donhangcuaban, dangnhap, dangxuat, taotaikhoang;

    ScrollView scrollView;

    Toolbar toolbar;
    TextView soLuongGioHang;

    EditText editSearch;
    GridView resultSearch;
    LinearLayout groupResultSearch;

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

    private void autoLogin(){
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
                visible(true);
                Toast.makeText(this,this.idKH, Toast.LENGTH_LONG).show();
            }
        }
        else
        {
            //nếu không có thì bắt buộc nhập
            visible(false);
            dal.logout();
            Toast.makeText(this,"KHÔNG TÌM THẤY THÔNG TIN LOGIN ĐÃ LƯU", Toast.LENGTH_LONG).show();
        }
    }

    private void visible(boolean visible){
        thongtintaikhoang.setVisibility(visible ? View.VISIBLE : View.GONE);
        doimatkhau.setVisibility(visible ? View.VISIBLE : View.GONE);
        donhangcuaban.setVisibility(visible ? View.VISIBLE : View.GONE);
        dangxuat.setVisibility(visible ? View.VISIBLE : View.GONE);
        //----------------------------------------------------------------
        dangnhap.setVisibility(!visible ? View.VISIBLE : View.GONE);
        taotaikhoang.setVisibility(!visible ? View.VISIBLE : View.GONE);
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
        autoLogin();
        loadGioHangs();
        lvLoaiSP_Menu adapMenu = new lvLoaiSP_Menu(homeActivity.this,lsLoaiSp_menu);
        lvMenu.setAdapter(adapMenu);

        final lvLoaiSP_Home adapHome = new lvLoaiSP_Home(homeActivity.this,lsLoaiSp);
        lvLoaiSanPham.setAdapter(adapHome);
        Helper.getListViewSize(lvLoaiSanPham);

        editSearch.setOnFocusChangeListener(new View.OnFocusChangeListener() {
            @Override
            public void onFocusChange(View view, boolean hasFocus) {
                if (hasFocus) {
                    Toast.makeText(getApplicationContext(), "Got the focus", Toast.LENGTH_LONG).show();
                    editSearch.addTextChangedListener(new TextWatcher() {
                        @Override
                        public void beforeTextChanged(CharSequence charSequence, int i, int i1, int i2) {}

                        @Override
                        public void onTextChanged(CharSequence charSequence, int i, int i1, int i2) {
                            Toast.makeText(homeActivity.this, "Searching !", Toast.LENGTH_LONG).show();
                            //request tìm kiếm kết quả
                            ArrayList<SanPham> resultSanPham = dal.search(editSearch.getText().toString());
                            //nếu có kết quả, hiện grid view KQ, ẩn list view SP
                            if(resultSanPham != null)
                            {
                                lvLoaiSanPham.setVisibility(View.GONE);
                                groupResultSearch.setVisibility(View.VISIBLE);
                                //hiển thị kết quả lên gridview
                                gridview_SP_Home adap = new gridview_SP_Home(homeActivity.this, resultSanPham);
                                resultSearch.setAdapter(adap);
                                ((BaseAdapter)resultSearch.getAdapter()).notifyDataSetChanged();

                                int nRow = resultSanPham.size()/2 + (resultSanPham.size()%2 > 0 ? 1 : 0);
                                View itemView = adap.getView(0,null, resultSearch);
                                itemView.measure(0,0);
                                int oneRowHeight = itemView.getMeasuredHeight() / 2;
                                ViewGroup.LayoutParams params = resultSearch.getLayoutParams();
                                params.height = oneRowHeight * nRow + 100;
                                resultSearch.setLayoutParams(params);
                            }
                        }

                        @Override
                        public void afterTextChanged(Editable editable) {
                            if(editSearch.getText().toString().isEmpty())
                            {
                                //Hiện list view SP
                                lvLoaiSanPham.setVisibility(View.VISIBLE);
                                ((BaseAdapter)lvLoaiSanPham.getAdapter()).notifyDataSetChanged();
                                //Ẩn và clear gridview kq
                                groupResultSearch.setVisibility(View.GONE);
                                gridview_SP_Home adap = (gridview_SP_Home) resultSearch.getAdapter();
                                adap.clear();
                            }
                        }
                    });
                } else {
                    Toast.makeText(getApplicationContext(), "End Searching !", Toast.LENGTH_LONG).show();
                    if(editSearch.getText().toString().isEmpty())
                    {
                        //Hiện list view SP
                        lvLoaiSanPham.setVisibility(View.VISIBLE);
                        ((BaseAdapter)lvLoaiSanPham.getAdapter()).notifyDataSetChanged();
                        //Ẩn và clear gridview kq
                        groupResultSearch.setVisibility(View.GONE);
                        gridview_SP_Home adap = (gridview_SP_Home) resultSearch.getAdapter();
                        adap.clear();
                    }
                }
            }
        });



        lvMenu.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> adapterView, View view, int i, long l) {
                lvLoaiSanPham.setSelection(i);
                drawerLayout.closeDrawer(Gravity.START);
            }
        });
        //CLOSE NAV MENU VÀ QUAY VỀ TRANG CHỦ
        trangchu.setOnClickListener(this);
        dangnhap.setOnClickListener(this);
        dangxuat.setOnClickListener(this);
        taotaikhoang.setOnClickListener(this);

    }

    private void FindView() {
        scrollView = findViewById(R.id.scrollView);

        toolbar = findViewById(R.id.toolBar);
        soLuongGioHang = findViewById(R.id.soLuongGioHang);

        editSearch = findViewById(R.id.valueSearch);
        resultSearch = findViewById(R.id.resultSerach);
        groupResultSearch = findViewById(R.id.groupResultSearch);

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

    @Override
    public void onClick(View view) {
        switch (view.getId()){
            case R.id.trangchu:
                drawerLayout.closeDrawer(Gravity.START);
                lvLoaiSanPham.setSelection(0);
                break;
            case R.id.thongtintaikhoang:
                break;
            case R.id.doimatkhau:
                break;
            case R.id.donhang:
                break;
            case R.id.dangnhap:
                chuyenActi(loginActivity.class);
                break;
            case R.id.dangxuat:
                if(dal.logout())
                {
                    chuyenActi(loginActivity.class);
                    visible(false);
                }
                break;
            case R.id.taotaikhoang:
                chuyenActi(activity_register.class);
                break;
        }
    }

    private void chuyenActi(Class<?> cls)
    {
        Intent intent = new Intent(this, cls);
        startActivity(intent);
    }
}
