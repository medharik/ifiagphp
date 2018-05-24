package com.harik.lenovo2017.di2;

import android.app.Activity;
import android.os.Bundle;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.EditText;
import android.widget.ImageView;
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
    private MonAdapter  mo;
    EditText ed=null;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_list_view_personnalisee);

        lv=findViewById(R.id.listpersonnalisee);
ed=findViewById(R.id.edcontact);
//peupler la liste de données data
        data=new ArrayList<>();
        for (int i=0;i<100;i++){
            Random r=new Random();
            Map<String,String> m=new HashMap<>();
            m.put("nom","HARIK "+r.nextInt(99));
            m.put("tel",""+r.nextInt(9999)%2);
            data.add(m);
        }

         mo=new MonAdapter();
        lv.setAdapter(mo);
    }
    public void ajouter(View v){
        Map<String,String> map=new HashMap<>();
        Random r=new Random();
        map.put("nom",ed.getText().toString());
        map.put("tel",""+r.nextInt()%2);
        data.add(map);

        mo.notifyDataSetChanged();
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

            if(convertView==null)
            convertView=getLayoutInflater().inflate(R.layout.monitem,null);

            TextView tvnom = convertView.findViewById(R.id.tvnomlist);
            TextView tvtel=convertView.findViewById(R.id.tvtellist);
            ImageView img=convertView.findViewById(R.id.imglist);

            Map<String,String> m=data.get(position);
            tvnom.setText(m.get("nom"));
            tvtel.setText(m.get("tel"));
            int tel = Integer.parseInt(m.get("tel"));
            if(tel==0){
                img.setImageResource(R.mipmap.logov);
                convertView.setBackgroundColor(getResources().getColor(R.color.colorAccent,null));
            }else {
                img.setImageResource(R.mipmap.ic_launcher);
                convertView.setBackgroundColor(getResources().getColor(R.color.colorPrimaryDark,null));

            }
            return convertView;
        }
    }
}
