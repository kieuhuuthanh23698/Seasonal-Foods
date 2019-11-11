package Adapter;

import android.app.Activity;
import android.content.Context;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.v7.widget.RecyclerView;
import android.support.v7.widget.RecyclerView.ViewHolder;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.GridView;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;
import android.widget.Toast;
import android.graphics.Paint;

import com.example.acer_pc.seasonalfoods.R;

import java.text.NumberFormat;
import java.util.ArrayList;
import java.util.Locale;

import Data.DAL;
import Objects.SanPham;

public class gridview_SP_Home extends ArrayAdapter<SanPham> {
    DAL dal;

    public gridview_SP_Home(@NonNull Context context, @NonNull ArrayList<SanPham> objects) {
        super(context, 0, objects);
        dal = new DAL(context);
    }

    private class ViewHolder {
        //lưu trữ view
        protected String idSP;
        protected ImageView img;
        protected TextView tenSP, soLuong;
        protected LinearLayout group_SL;
        protected Button btn_them, btn_tang, btn_giam;
    }

    @NonNull
    @Override
    public View getView(final int position, @Nullable View convertView, @NonNull ViewGroup parent) {
        final ViewHolder holder;
        SanPham item = getItem(position);
        if(convertView == null) {
            convertView = LayoutInflater.from(getContext()).inflate(R.layout.grid_item_sp, parent, false);
            holder = new ViewHolder();
            holder.idSP = item.getMaSP();
            holder.img = convertView.findViewById(R.id.gvItem_img);
            holder.tenSP = convertView.findViewById(R.id.gvItem_name);
            holder.btn_them = convertView.findViewById(R.id.gvItem_btnMua);
            holder.group_SL = convertView.findViewById(R.id.gvItem_Group_SL);
            holder.btn_giam = convertView.findViewById(R.id.gvItem_Giam);
            holder.soLuong = convertView.findViewById(R.id.gvItem_sl);
            holder.btn_tang = convertView.findViewById(R.id.gvItem_Tang);
            convertView.setTag(holder);
        }
        else
        {
            holder = (ViewHolder) convertView.getTag();
        }
        //              SET VALUE CHO CÁC CHILD VIEW

        ImageView imageView = convertView.findViewById(R.id.gvItem_img);
        imageView.setImageResource(item.getHinhanh());

        TextView txtTenSP , txtGia, txtGiaKM, txtSoLuong;



        int phanTramKM = (int)( ( ( item.getGia() - item.getGiaKM() ) /item.getGia() ) *100);
        if(phanTramKM > 0)
        {
            TextView txtDeal = convertView.findViewById(R.id.deal);
            ImageView iconDeal = convertView.findViewById(R.id.iconDeal);
            txtDeal.setVisibility(View.VISIBLE);
            iconDeal.setVisibility(View.VISIBLE);
            txtDeal.setText( "-" +  NumberFormat.getNumberInstance(Locale.US).format(phanTramKM) + "%");


            txtGia = convertView.findViewById(R.id.gvItem_gia);
            txtGia.setVisibility(View.VISIBLE);
            txtGia.setText(NumberFormat.getNumberInstance(Locale.US).format(item.getGia()) + " đ");
            txtGia.setPaintFlags(txtGia.getPaintFlags() | Paint.STRIKE_THRU_TEXT_FLAG);
        }



        txtTenSP = convertView.findViewById(R.id.gvItem_name);
        txtTenSP.setText(item.getTenSP());

        txtGiaKM = convertView.findViewById(R.id.gvItem_giaKM);
        txtGiaKM.setText(NumberFormat.getNumberInstance(Locale.US).format(item.getGiaKM()) + " đ");

        txtSoLuong = convertView.findViewById(R.id.gvItem_sl);
        txtSoLuong.setText(dal.existInCart(item.getMaSP()));

        LinearLayout groupLS = convertView.findViewById(R.id.gvItem_Group_SL);
        Button btnThem = convertView.findViewById(R.id.gvItem_btnMua);
        if(Integer.parseInt(txtSoLuong.getText().toString()) > 0)
        {
            btnThem.setVisibility(View.GONE);
            groupLS.setVisibility(View.VISIBLE);
        }

        //set sự kiện cho các control trên item của gridview
        holder.img.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Toast.makeText(getContext(),"XEM CHI TIẾT SẢN PHẨM !", Toast.LENGTH_SHORT).show();
            }
        });
        holder.btn_them.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                holder.group_SL.setVisibility(View.VISIBLE);
                holder.btn_them.setVisibility(View.GONE);
                holder.soLuong.setText("1");
                dal.insert_SP(holder.idSP);
                Context context = getContext();
                TextView tv = (TextView) ((Activity) context).findViewById(R.id.soLuongGioHang);
                DAL dal = new DAL(context);
                tv.setText(dal.soLuong_CT_SP());
                tv.setVisibility(View.VISIBLE);
                Toast.makeText(getContext(),"THÊM SẢN PHẨM VÀO GIỎ", Toast.LENGTH_SHORT).show();
            }
        });
        holder.btn_giam.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                TextView txtSL = holder.soLuong;
                int sl = Integer.parseInt(txtSL.getText().toString()) - 1;
                if(sl == 0)
                {
                    holder.group_SL.setVisibility(View.GONE);
                    holder.btn_them.setVisibility(View.VISIBLE);
                    txtSL.setText("0");
                    dal.delete_SP(holder.idSP);
                    Context context = getContext();
                    TextView tv = (TextView) ((Activity) context).findViewById(R.id.soLuongGioHang);
                    DAL dal = new DAL(context);
                    tv.setText(dal.soLuong_CT_SP());
                    tv.setVisibility(View.GONE);
                    Toast.makeText(getContext(),"Xóa sản phẩm khỏi giỏ !", Toast.LENGTH_SHORT).show();
                }
                else
                {
                    dal.update_SoLuong_SP(holder.idSP, sl + "");
                    Toast.makeText(getContext(),"Giảm số lên thành : " + sl, Toast.LENGTH_SHORT).show();
                    txtSL.setText("" + sl);
                }
            }
        });
        holder.btn_tang.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                TextView txtSL = holder.soLuong;
                int sl = Integer.parseInt(txtSL.getText().toString()) + 1;
                if(sl > 10)
                {
                    dal.update_SoLuong_SP(holder.idSP, sl + "");
                    Toast.makeText(getContext(),"Tăng số lên thành : " + sl, Toast.LENGTH_SHORT).show();
                    txtSL.setText("10");

                }
                else
                {
                    dal.update_SoLuong_SP(holder.idSP, sl + "");
                    Toast.makeText(getContext(),"Tăng số lên thành : " + sl, Toast.LENGTH_SHORT).show();
                    txtSL.setText("" + sl);
                }
            }
        });
        return convertView;
    }
}
