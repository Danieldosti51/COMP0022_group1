import pandas as pd
import csv
import numpy

#Goal: Normalised movies.csv to 1NF
#step1: create a new coloumn: Year. trucate the year_of_publication from title column. 


#filePath = open('C:/Users/26361/OneDrive/Documents/UCL/3rdYear/T2/Database/ml-latest-small/movies.csv')

#read the csv file and load data in to a DataFrame
df = pd.read_csv("movies.csv")
#print(df)

#test in one row 
# title = title[1:-1]
# print(df.title[1511])
# print(df.title[1512][0])
# print(df.title[1512][1:-1])

#add a year column
df.insert(2,"year",'')

def trucate_year_out_of_title(df):
    for i in df.index:
        title = df.at[i,"title"]
        title_without_year = title[:-6]
        df.at[i,"title"] = title_without_year
        year_of_publication = title[-5:-1]
        #print("index:",i, "Year:", year_of_publication, "type of year:",type(year_of_publication))
        df.at[i,"year"] = year_of_publication
    #return df
    
trucate_year_out_of_title(df)

#print(df)