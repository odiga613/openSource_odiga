import pandas as pd

df = pd.read_excel('database.xlsx')

location = df["area"]
loc_all = df["area"].values.tolist()
tf = df.to_dict('records')

# 검색

def Serch():
    print("검색어를 입력하세요.")
    keyword = input("--> ")
    if keyword in loc_all:
        ans = loc_all.index(keyword)
        x_point = tf[ans].get('real_user_target_coordinate_x')
        y_point = tf[ans].get('real_user_target_coordinate_y')
        print(x_point,y_point)
    else:
        print("해당 검색어가 없습니다.")
    return

# 자동완성

while(1):
    print("1. 전체 목록")
    print("2. 검색")
    print("3. 종료")
    num = input("입력:")

    if num == "1":
        print(loc_all)

    elif num == "2":
        Serch()

    elif num == "3":
        print("종료합니다")
        break

    else:
       print("잘못 입력하였습니다.")
