import pandas as pd
import csv
import numpy

#Goal: Normalised movies.csv to 3NF
#1: to 1NF
#       To achieve that, we need to:
#           1.1.In the movie,csv: separate year from tite, and create a new column put the year in
#           1.2 create a new table for for genre
#           1.3 create a new talbe contain the name of move a
#           1.3 remove the genre in movies.csv
#           1.4 a movie can fit many genres, many-to-many realtionship need to be defined, satisfied by creat a link table


# 1.1 create a new coloumn: Year. trucate the year_of_publication from title column.

#read the csv file and load data in to a DataFrame
df = pd.read_csv("Dataset/movies.csv")
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

#1.2
def create_new_table_for_genres():
    df = pd.DataFrame( {"genres ID": list(range(1,20)),
    "genre names":
        ["Action",
         "Adventure",
         "Animation",
         "Children's",
         "Comedy",
         "Crime",
         "Documentary",
         "Drama",
         "Fantasy",
         "Film-Noir",
         "Horror",
         "Musical",
         "Mystery",
         "Romance",
         "Sci-Fi",
         "Thriller",
         "War",
         "Western",
         "(no genres listed)"
        ]})
    df.to_csv('Dataset/Genres.csv',header = "genres", index=False)
    
create_new_table_for_genres()
        
#def create_table_movie


print(df)

df.to_csv('Dataset/normalised_movie.csv',index=False)
