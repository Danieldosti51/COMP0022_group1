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

df_g = pd.DataFrame( {
    "genres ID": list(range(1,20)),
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
    df_g.to_csv('Dataset/genres.csv',header = "genres", index=False)
    
create_new_table_for_genres()
        
        


def create_table_movieID_to_geresID():
    cols =["movie ID","genre name"]
    df_mID_gID = pd.DataFrame(columns = cols,index = False )
    #df read the movie.csv
    for i in df.index:
        #for each genre in all the genres of each movie
        genres_of_each_movie = df.at[i,"genres"]
        for current_genre in genres_of_each_movie.split("|"):
            #if they are in the list of df_g, create a row for the movie ID and
            # the corresponding genre ID in the table
            #print(genre)

            if current_genre in df_g["genre names"].tolist():
                #print("the genre " + current_genre + "is in the genres list")
                #To improve efficiency use pd.concat()
                new_row = [i,current_genre]
                new_df = pd.DataFrame([new_row],columns = cols)
                #print(new_df)
                df_mID_gID=pd.concat([df_mID_gID,new_df])
                
                
    df_mID_gID.to_csv('Dataset/movieID_genreName.csv')

create_table_movieID_to_geresID()

print(df_g["genre names"].tolist())

#df.to_csv('Dataset/normalised_movie.csv',index=False)
