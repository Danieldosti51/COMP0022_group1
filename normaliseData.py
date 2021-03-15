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

genre_names = ["Action",
             "Adventure",
             "Animation",
             "Children",
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
             "(no genres listed)"]

genre_to_id = {genre_names[i - 1]: i for i in range(1, 20)}

df_g = pd.DataFrame( {
    "genres ID": list(range(1,20)),
    "genre names":
        ["Action",
         "Adventure",
         "Animation",
         "Children",
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

def trucate_year_out_of_title(df):
    df.insert(2,"year",'')
    for i in df.index:
        title = df.at[i,"title"].strip()
        if title[-1] == ')':
            title_without_year = title[:-6]
            df.at[i,"title"] = title_without_year
            year_of_publication = title[-5:-1]
            df.at[i,"year"] = year_of_publication
        else:
            df.at[i,"title"] = title
            df.at[i,"year"] = '/N'
    df.to_csv('Dataset/normalised_movies.csv',index = False)
    
#1.2
def create_new_table_for_genres():
    df_g.to_csv('Dataset/genreID_to_genreName.csv',index = False,header = "genres")
        
#1.3.2
def create_table_movieID_to_genreId():
    cols =["movieId","genreId"]
    #cols =["movie ID","genre name"]
    df_mID_gID = pd.DataFrame(columns = cols)
    #df read the movie.csv
    for i in df.index:
        #for each cell in all the genres columns of each movie
        genres_of_each_movie = df.at[i,"genres"]
        for current_genre in genres_of_each_movie.split("|"):
            #if they are in the list of df_g, create a row for the movie ID and
            # the corresponding genre ID in the table
            #print(genre)

            if current_genre in df_g["genre names"].tolist():
                #print("the genre " + current_genre + "is in the genres list")
                #take the movieId and the genrename,form a new row
                #new_row = [df.at[i,"movieId"],current_genre]
                new_row = [df.at[i,"movieId"], genre_to_id[current_genre]]
                #give new_row
                new_df = pd.DataFrame([new_row], columns = cols)
                #print(new_df)
                df_mID_gID=pd.concat([df_mID_gID,new_df])
                
    df_mID_gID.to_csv('Dataset/movieId_to_genreId.csv',index = False)
    
#1.3.1
def remove_genres_in_normalised_movies_file():
    df_drop_genres = df.drop(columns=['genres'])
    df_drop_genres.to_csv('Dataset/normalised_movies.csv',index = False)


#main
#do genres 1.2&1.3 first then year 1.1
trucate_year_out_of_title(df)
create_new_table_for_genres()
create_table_movieID_to_genreId()
remove_genres_in_normalised_movies_file()
print('end')


#2NF:
