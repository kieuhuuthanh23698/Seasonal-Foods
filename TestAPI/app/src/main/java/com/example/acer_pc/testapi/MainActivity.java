package com.example.acer_pc.testapi;

import com.example.acer_pc.testapi.Helper.*;
import com.google.gson.Gson;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import org.json.JSONArray;
import org.json.JSONException;

import java.util.ArrayList;
import java.util.concurrent.ExecutionException;

public class MainActivity extends AppCompatActivity implements View.OnClickListener{

    Button btnReq;
    EditText txtURL;
    TextView txtResult;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        btnReq = findViewById(R.id.btnRequest);
        txtURL = findViewById(R.id.txtURL);
        txtResult = findViewById(R.id.txtResult);
        btnReq.setOnClickListener(this);


    }


    @Override
    public void onClick(View view) {

        ArrayList<String> list = new ArrayList<String>();
        list.add("JAVA");
        list.add("Android");
        list.add("Kotlin");
        list.add("C programing Language");
        list.add("C plus plus");
        Gson gson = new Gson();
        String arrayData = gson.toJson(list);

        Request req = new Request(arrayData);
        //req.execute("http://" + getResources().getString(R.string.apiv4) + txtURL.getText().toString());
        req.execute("http://" + txtURL.getText().toString());
        JSONArray result;
        String res = "";
        try {
            res = req.get().toString();
            result = new JSONArray(res);
            if(result == null)
                txtResult.setText(res);
            else
                txtResult.setText(result.toString());
        } catch (InterruptedException e) {
            e.printStackTrace();
            txtResult.setText(e.toString());
            if(res != "")
                txtResult.setText(res + "\n" + txtResult.getText());
        } catch (ExecutionException e) {
            e.printStackTrace();
            txtResult.setText(e.toString());
            if(res != "")
                txtResult.setText(res + "\n" + txtResult.getText());
        } catch (JSONException e) {
            e.printStackTrace();
            txtResult.setText(e.toString());
            if(res != "")
                txtResult.setText(res + "\n" + txtResult.getText());
        }
        //req.cancel(true);
    }
}
