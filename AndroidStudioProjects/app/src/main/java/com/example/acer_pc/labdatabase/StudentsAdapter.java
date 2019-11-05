package com.example.acer_pc.labdatabase;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import java.util.ArrayList;

public class StudentsAdapter extends ArrayAdapter<Student> {
    public StudentsAdapter(@NonNull Context context, ArrayList<Student> objects) {
        super(context, 0, objects);
    }

    @NonNull
    @Override
    public View getView(int position, @Nullable View convertView, @NonNull ViewGroup parent) {

        if(convertView == null) {
            convertView = LayoutInflater.from(getContext()).inflate(R.layout.layout_row, parent,false);
        }

        ImageView imgGender = convertView.findViewById(R.id.imageView);
        TextView txtName = convertView.findViewById(R.id.name);
        TextView txtAddress = convertView.findViewById(R.id.address);

        Student item = getItem(position);
        imgGender.setImageResource(item.getGender() == 1?R.drawable.man:R.drawable.woman);
        txtName.setText(item.getName());
        txtAddress.setText(item.getAddress());

        return convertView;
    }
}
