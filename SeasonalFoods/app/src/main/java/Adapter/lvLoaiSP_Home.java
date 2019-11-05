package Adapter;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.GridView;
import android.widget.TextView;

import com.example.acer_pc.seasonalfoods.R;

import java.util.ArrayList;

import Objects.LoaiSanPham;

public class lvLoaiSP_Home extends ArrayAdapter<LoaiSanPham> {
    public lvLoaiSP_Home(@NonNull Context context, @NonNull ArrayList<LoaiSanPham> objects) {
        super(context, 0, objects);
    }

    @NonNull
    @Override
    public View getView(int position, @Nullable View convertView, @NonNull ViewGroup parent) {
        if(convertView == null)
            convertView = LayoutInflater.from(getContext()).inflate(R.layout.lv_item_loaisp_home, parent, false);
        TextView tvLoaiSP = convertView.findViewById(R.id.lvItemLoaiSP);
        LoaiSanPham loaiSP = getItem(position);
        tvLoaiSP.setText(loaiSP.getTenLoaiSP());
        GridView gridViewLoaiSP = convertView.findViewById(R.id.gvSanPham);
        gridview_SP_Home adap = new gridview_SP_Home(getContext(),loaiSP.getListSP());
        gridViewLoaiSP.setAdapter(adap);
        return convertView;
    }
}

