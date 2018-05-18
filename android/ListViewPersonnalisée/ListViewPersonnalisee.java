package com.harik.lenovo2017.di2;

import android.app.Activity;
import android.os.Bundle;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ListView;
import android.widget.TextView;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import java.util.Random;

public class ListViewPersonnalisee extends Activity {
ListView lv;
List<Map<String, String>>     data;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_list_view_personnalisee);
        lv=findViewById(R.id.listpersonnalisee);
        data=new ArrayList<>();
        for (int i=0;i<100;i++){
            Random r=new Random();
          Map<String,String> m=new HashMap<>();
            m.put("nom","celestin "+r.nextInt(9999));
            m.put("tel",""+r.nextLong());
            data.add(m);

        }
        MonAdapter adapter=new MonAdapter();
        lv.setAdapter(adapter);


    }


    class MonAdapter extends BaseAdapter{

        @Override
        public int getCount() {
            return data.size();
        }

        @Override
        public Object getItem(int position) {
            return data.get(position);
        }

        @Override
        public long getItemId(int position) {
            return position;
        }

        @Override
        public View getView(int position, View convertView, ViewGroup parent) {
        if(convertView ==null)
       convertView = getLayoutInflater().inflate(R.layout.monitem,null);
          TextView tvnom= convertView.findViewById(R.id.tvnomlist);
            TextView tvtel= convertView.findViewById(R.id.tvtellist);
            Map<String,String> m=data.get(position);
            tvnom.setText(m.get("nom"));
            tvtel.setText(m.get("tel"));



            return convertView;

        }
    }
}
