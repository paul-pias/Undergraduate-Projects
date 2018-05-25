#include <bits/stdc++.h>

using namespace std;



pair<int,float> makeDecision(vector<vector<string> > &data,vector<string> &v,double k)
{
    //cout<<data.size()<<endl;
    vector<pair<int,float> >cls;
    for(int i=0;i<v.size()-1;i++)
    {
        float val=atof(v[i].c_str());
      //  cout<<"hi";
        for(int j=0;j<data.size();j++)
        {
            float typeval=atof(data[j][i].c_str());
            int cl=atoi(data[j][data[0].size()-1].c_str());
           // cout<<val<<" "<<typeval<<" "<<k<<endl;
            if(typeval<=val&&typeval+k>=val)
            {
                cls.push_back({cl,abs(typeval-val)});
            }
            else if(typeval>=val&&typeval-k<=val)
            {
                cls.push_back({cl,abs(typeval-val)});
            }
            else if(typeval>val+k)
                break;
        }
    }
    sort(cls.begin(),cls.end());
    int mxcls=-1,mx=0,cnt=1;
    float dis=999999;
    for(int i=1;i<cls.size();i++)
    {
        if(cls[i].first!=cls[i-1].first)
        {
            if(cnt>mx)
            {
                mx=cnt;
                mxcls=cls[i-1].first;
                dis=cls[i-1].second;
            }
            else if(cnt==mx&&dis>cls[i-1].second)
            {
                mxcls=cls[i-1].first;
                dis=cls[i-1].second;
            }
            cnt=1;
        }
        else
            cnt++;
    }
    if(cnt>mx&&cls.size()>0)
        mxcls=cls[cls.size()-1].first,dis=cls[cls.size()-1].second;

    return {mxcls,dis};
}
string defaultclass(vector<vector<string> > &data)
{
    map<string,int>als;
    for(int  i=1;i<data.size();i++)
    {
        if(als.count(data[i][data[0].size()-1])==0)
            als[data[i][data[0].size()-1]]=1;
        else
            als[data[i][data[0].size()-1]]++;
    }
    map<string,int>::iterator iter;
    int mx=0;
    string ds;
    for(iter=als.begin();iter!=als.end();iter++)
    {
        if(iter->second>=mx)
        {
            mx=iter->second;
            ds=iter->first;
        }
    }
    return ds;
}

int main(int argc, char ** argv)
{
    if(argc!=4)
    {
        cout<<"Insufficient Arguments"<<endl;
        return 1;
    }
    vector<vector<string> >data;
    ifstream inp;
    string cmd=argv[1];
    inp.open(cmd.c_str());
    string str;
    while(getline(inp,str))
    {
        int arc=0;
        vector<string>v;
        istringstream is(str);
        for(string s;is>>s;)
        {
            if(s!=" "||s.size()>0)
                v.push_back(s);
        }
        data.push_back(v);
        v.clear();
    }
    sort(data.begin(),data.end());
    inp.close();
    cmd=argv[2];
    inp.open(cmd.c_str());
    int ds=atoi(defaultclass(data).c_str());
    vector<vector<string> >testdata;
    while(getline(inp,str))
    {
        int arc=0;
        vector<string>v;
        istringstream is(str);
        for(string s;is>>s;)
        {
            if(s!=" "||s.size()>0)
                v.push_back(s);
            else
                continue;

        }

        testdata.push_back(v);
    }
    cmd=argv[3];
    float k=atof(cmd.c_str());
    float corr=0.0,total=0.0;
    for(int i=0;i<testdata.size();i++)
    {
        string gs=testdata[i][testdata[i].size()-1];
        int gsd=atoi(gs.c_str());
        pair<int,float>p=makeDecision(data,testdata[i],k);
        int pc=p.first;
        float dis=p.second;
        if(pc==-1)
            pc=ds;
        total+=1.0;
        if(gsd==pc)
            corr+=1.0;
        float accuracy=corr/total;
        printf("ID=%5d, predicted=%3d, true=%3d, distance=%7.2f, accuracy=%4.2f\n",i+1,pc,gsd,dis, accuracy);
    }

    return 0;
}
