package com.harik.lenovo2017.di2;

import android.app.Activity;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.List;
import java.util.Random;

public class ListArray extends Activity implements AdapterView.OnItemClickListener {
ListView lvalistarray;
List<String> data;
ArrayAdapter adapter;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_list_array);
    lvalistarray=findViewById(R.id.lvlistearray);
//peupler data
        data=new ArrayList<>();
        for (int i=0;i<100;i++){
            Random r=new Random();
            data.add("élément : "+r.nextInt(9999));
        }
        adapter=new ArrayAdapter(ListArray.this,android.R.layout.simple_list_item_1,data);
        //lier la listView avec l' adapter
        lvalistarray.setAdapter(adapter);
        lvalistarray.setOnItemClickListener(this);
    }


    @Override
    public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
        String mot = data.get(position);
        Toast.makeText(this, "élément séléctionné est "+mot, Toast.LENGTH_SHORT).show();
        //pour ajouter un élément dans la liste :
        adapter.add("nouveau élément ");
        // pour supprimer
        adapter.remove("test");
        //inserer ou modifier
        adapter.insert("tst 2",0);
        // ou data.add("test") +         adapter.notifyDataSetChanged();
    }
}
