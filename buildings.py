import pandas as pd

df = pd.read_excel('database.xlsx')
df = pd.DataFrame(df)
df = df.iloc[:, 1:]
P = []

for i in range(len(df)):
    P.append([df.iloc[i, 0], df.iloc[i, 1], df.iloc[i, 2], df.iloc[i, 3]])