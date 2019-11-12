package Adapter;

import android.app.Activity;
import android.content.Context;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.util.Log;
import android.util.TypedValue;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.view.ViewParent;
import android.view.ViewTreeObserver;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.GridView;
import android.widget.TextView;
import android.widget.Toast;

import com.example.acer_pc.seasonalfoods.R;

import java.util.ArrayList;

import Data.DataAccessLayer;
import Objects.LoaiSanPham;

public class lvLoaiSP_Home extends ArrayAdapter<LoaiSanPham> {
    public lvLoaiSP_Home(@NonNull Context context, @NonNull ArrayList<LoaiSanPham> objects) {
        super(context, 0, objects);
    }

    @NonNull
    @Override
    public View getView(int position, @Nullable View convertView, @NonNull final ViewGroup parent) {
        if(convertView == null)
            convertView = LayoutInflater.from(getContext()).inflate(R.layout.lv_item_loaisp_home, parent, false);
        TextView tvLoaiSP = convertView.findViewById(R.id.lvItemLoaiSP);
        LoaiSanPham loaiSP = getItem(position);
        tvLoaiSP.setText(loaiSP.getTenLoaiSP());
        final GridView gridViewLoaiSP = convertView.findViewById(R.id.gvSanPham);
        final gridview_SP_Home adap = new gridview_SP_Home(getContext(),loaiSP.getListSP());
        gridViewLoaiSP.setAdapter(adap);

        //resize gridview
        int nRow = loaiSP.getListSP().size()/2 + (loaiSP.getListSP().size()%2 > 0 ? 1 : 0);
        Log.i("2", loaiSP.getTenLoaiSP() + "|" + nRow);
//        View itemView = adap.getView(0,null, gridViewLoaiSP);
//        itemView.measure(0,0);
//        int oneRowHeight = itemView.getMeasuredHeight() / 2;
        int oneRowHeight = 275 + (int) TypedValue.applyDimension(TypedValue.COMPLEX_UNIT_DIP, 1,getContext().getResources().getDisplayMetrics());
        Log.i("2", "height : " + oneRowHeight);
        ViewGroup.LayoutParams params = gridViewLoaiSP.getLayoutParams();
        params.height = oneRowHeight * nRow + 1600;
        Log.i("2", "grid height : " + (oneRowHeight * nRow + 1600));
        gridViewLoaiSP.setLayoutParams(params);
        return convertView;
    }
}