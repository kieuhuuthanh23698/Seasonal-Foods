package com.example.acer_pc.customlistview2;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import java.util.ArrayList;

public class ImagesAdapterGridView extends ArrayAdapter<Image> {
    public ImagesAdapterGridView(@NonNull Context context, @NonNull ArrayList<Image> objects) {
        super(context, 0, objects);
    }

    @NonNull
    @Override
    public View getView(int position, @Nullable View convertView, @NonNull ViewGroup parent) {
        Image item = getItem(position);
        if(convertView == null)
            convertView = LayoutInflater.from(getContext()).inflate(R.layout.griditem, parent, false);

        //set value cho item
        ImageView imageView = convertView.findViewById(R.id.imageView);
        imageView.setImageBitmap(item.Image);
        //imageView.setImageResource(R.drawable.image01);
        return convertView;
    }
}
