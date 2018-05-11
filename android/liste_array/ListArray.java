package com.harik.lenovo2017.di2;

import android.app.Activity;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.LinkedList;
import java.util.List;
import java.util.Random;

public class ListArray extends Activity implements AdapterView.OnItemClickListener {
    ListView lvarray;
    List<String> data;
    ArrayAdapter adapter;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_list_array);
        lvarray=findViewById(R.id.lvlistearray);
        data=new ArrayList<>();
        for (int i=0;i<100;i++){
            Random r=new Random();
            data.add("info "+r.nextInt(9999));
        }
        adapter=new ArrayAdapter(this,android.R.layout.simple_list_item_1,data);
        //attacher l'adapter avec la liste
        lvarray.setAdapter(adapter);
lvarray.setOnItemClickListener(this);

    }


    @Override
    public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
        Toast.makeText(this, "élémént choisit est : "+data.get(position).toString(), Toast.LENGTH_SHORT).show();

    }
}
