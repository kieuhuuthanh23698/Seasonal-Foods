package Adapter;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.TextView;

import com.example.acer_pc.seasonalfoods.R;

public class lvLoaiSP_Menu extends ArrayAdapter<String> {
    public lvLoaiSP_Menu(@NonNull Context context, @NonNull String[] objects) {
        super(context, 0, objects);
    }

    @NonNull
    @Override
    public View getView(int position, @Nullable View convertView, @NonNull ViewGroup parent) {
        if(convertView == null)
            convertView = LayoutInflater.from(getContext()).inflate(R.layout.lv_item_loaisp, parent, false);
        TextView tvLoaiSP = convertView.findViewById(R.id.lvItemLoaiSP);
        String loaiSP = getItem(position);
        tvLoaiSP.setText(loaiSP);
        return convertView;
    }
}
