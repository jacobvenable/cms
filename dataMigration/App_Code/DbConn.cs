using System;
using System.Data;
using System.Data.SqlClient;
using System.Configuration;
using System.Web;
using System.Web.Security;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Web.UI.WebControls.WebParts;
using System.Web.UI.HtmlControls;

/// <summary>
/// Summary description for DbConn
/// </summary>
public class DbConn
{
    public string connStr = "server=sotdev4.tech.purdue.edu;uid=cgt411user;pwd=Cogent2014!;database=cgt_profdev";
    public SqlDataAdapter dbSDA;
    public DataSet dbDS;
    public SqlDataReader dbDR;
    public DataTable dbDT;
    public SqlConnection dbConn;
    public SqlCommand dbCmd;
    public string SQL;

    public DbConn()
    {
    }

    public System.Data.DataSet createDataSet(string sql)
    {
        dbConn = new SqlConnection(connStr);
        dbConn.Open();
        dbCmd = new SqlCommand(sql, dbConn);
        dbSDA = new SqlDataAdapter();
        dbSDA.SelectCommand = dbCmd;
        dbDS = new DataSet();
        dbSDA.Fill(dbDS);
        return dbDS;
    }

    public System.Data.SqlClient.SqlDataReader createDataReader(string sql)
    {
        dbConn = new SqlConnection(connStr);
        dbConn.Open();
        dbCmd = new SqlCommand(sql, dbConn);

        dbDR = dbCmd.ExecuteReader();

        return dbDR;
    }
}
