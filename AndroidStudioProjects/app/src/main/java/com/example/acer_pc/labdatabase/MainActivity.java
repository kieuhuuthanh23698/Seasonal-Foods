package com.example.acer_pc.labdatabase;

import android.content.DialogInterface;
import android.support.annotation.IdRes;
import android.support.v7.app.ActionBar;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.ContextMenu;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.widget.AdapterView;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.RadioButton;
import android.widget.RadioGroup;

import java.util.ArrayList;

public class MainActivity extends AppCompatActivity {
    ListView ltsSV;
    ArrayList<Student> arrSV;
    StudentsAdapter svAdap;
    DBHelper db;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        ActionBar actionBar = getSupportActionBar();

        actionBar.setDisplayShowHomeEnabled(true);
        actionBar.setLogo(R.drawable.contacts_icon);    //Icon muốn hiện thị
        actionBar.setDisplayUseLogoEnabled(true);
        //Kết nối database
        db = new DBHelper(MainActivity.this);
        //Init control
        ltsSV = findViewById(R.id.ltsSV);
        arrSV = db.getAllStudent();
        //Khởi tạo adapter
        svAdap = new StudentsAdapter(MainActivity.this, arrSV);
        //Dùng adapter gắn dữ liệu vào list view
        ltsSV.setAdapter(svAdap);
        registerForContextMenu(ltsSV);
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        MenuInflater inflater = getMenuInflater();
        inflater.inflate(R.menu.main_menu,menu);
        return super.onCreateOptionsMenu(menu);
    }
    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        if(item.getItemId() == R.id.menu_add){
            final Student student = new Student();
            AlertDialog.Builder builder = new AlertDialog.Builder(MainActivity.this);
            builder.setTitle("Create new contact");
            builder.setCancelable(false);
            LayoutInflater inflater = LayoutInflater.from(MainActivity.this);
            View view = inflater.inflate(R.layout.layout_input,null);
            final EditText edtName = view.findViewById(R.id.txName);
            final EditText edtAddress = view.findViewById(R.id.txAddress);
            final RadioGroup rdg = view.findViewById(R.id.rdGroup);
            final ImageView img = view.findViewById(R.id.imgGender);
            builder.setView(view);
            rdg.setOnCheckedChangeListener(new RadioGroup.OnCheckedChangeListener() {
               @Override
               public void onCheckedChanged(RadioGroup group, @IdRes int checkedId) {
                   switch (checkedId){
                       case R.id.rdFemale:
                           student.setGender(1);
                           img.setImageResource(R.drawable.woman);
                           break;
                       case R.id.rdMale:
                           student.setGender(0);
                           img.setImageResource(R.drawable.man);
                           break;
                   }
               }
           });

            builder.setPositiveButton("Yes", new DialogInterface.OnClickListener() {
                        @Override
                        public void onClick(DialogInterface dialog, int
                                which) {
                            student.setName(edtName.getText().toString());
                            student.setAddress(edtAddress.getText().toString());
                            db.insertStudent(student);
                            arrSV.add(student);
                            svAdap.notifyDataSetChanged();
                        }
                    });
            builder.setNegativeButton("Cancel", new
                    DialogInterface.OnClickListener() {
                        @Override
                        public void onClick(DialogInterface dialog, int
                                which) {
                            dialog.cancel();
                        }
                    });

            AlertDialog alertDialog = builder.create();
            alertDialog.show();
        }
        return super.onOptionsItemSelected(item);
    }
    //them menu Update va delete
    @Override
    public void onCreateContextMenu(ContextMenu menu, View v, ContextMenu.ContextMenuInfo menuInfo) {
        super.onCreateContextMenu(menu, v, menuInfo);
        MenuInflater inflater = getMenuInflater();
        inflater.inflate(R.menu.context_menu,menu);
    }
    //xu ly menu Update va delete
    @Override
    public boolean onContextItemSelected(MenuItem item) {
        final AdapterView.AdapterContextMenuInfo info = (AdapterView.AdapterContextMenuInfo) item.getMenuInfo();
        switch (item.getItemId()) {
            case R.id.menu_update:
                final Student student = arrSV.get(info.position);
                AlertDialog.Builder builder = new AlertDialog.Builder(MainActivity.this);
                builder.setTitle("Update contact");
                builder.setCancelable(false);
                LayoutInflater inflater = LayoutInflater.from(MainActivity.this);
                View view = inflater.inflate(R.layout.layout_input, null);
                final EditText edtName = view.findViewById(R.id.txName);
                final EditText edtAddress = view.findViewById(R.id.txAddress);
                final RadioGroup rdg = view.findViewById(R.id.rdGroup);
                final RadioButton rdbMale = view.findViewById(R.id.rdMale);
                final RadioButton rdbFemale = view.findViewById(R.id.rdFemale);
                final ImageView img = view.findViewById(R.id.imgGender);
                edtName.setText(student.getName());
                edtAddress.setText(student.getAddress());
                if (student.getGender() == 1) {
                    rdbMale.setChecked(true);
                    img.setImageResource(R.drawable.man);
                } else {
                    rdbFemale.setChecked(true);
                    img.setImageResource(R.drawable.woman);
                }
                builder.setView(view);
                rdg.setOnCheckedChangeListener(new RadioGroup.OnCheckedChangeListener() {
                    @Override
                    public void onCheckedChanged(RadioGroup group, @IdRes int checkedId) {
                        switch (checkedId) {
                            case R.id.rdMale:
                                student.setGender(1);
                                img.setImageResource(R.drawable.man);
                                break;
                            case R.id.rdFemale:
                                student.setGender(0);
                                img.setImageResource(R.drawable.woman);
                                break;
                        }
                    }
                });

                builder.setPositiveButton("Yes", new
                        DialogInterface.OnClickListener() {
                            @Override
                            public void onClick(DialogInterface dialog, int which) {
                                student.setName(edtName.getText().toString());
                                student.setAddress(edtAddress.getText().toString());
                                db.updateStudent(student);
                                arrSV.set(info.position, student);
                                svAdap.notifyDataSetChanged();
                            }
                        });
                builder.setNegativeButton("Cancel", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        dialog.cancel();
                    }
                });
                AlertDialog alertDialog = builder.create();
                alertDialog.show();
                break;
            case R.id.menu_delete:
                final Student student1 = arrSV.get(info.position);
                AlertDialog.Builder builder1 = new AlertDialog.Builder(MainActivity.this);
                builder1.setTitle("Delete contact !");
                builder1.setCancelable(false);
                builder1.setMessage("Are you sure delete \" " + student1.getName() + "\"");
                builder1.setPositiveButton("Yes", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        db.deleteStudent(student1);
                        arrSV.remove(info.position);
                        svAdap.notifyDataSetChanged();
                    }
                });
                builder1.setNegativeButton("No", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        dialog.cancel();
                    }
                });
                AlertDialog alertDialog1 = builder1.create();
                alertDialog1.show();
                break;
        }
        return super.onContextItemSelected(item);
    }
}
