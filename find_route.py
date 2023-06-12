import networkx as nx
import osmnx as ox
import folium
from buildings import P

# 위치 주소값
n = int(input("0 ~ 67: "))

now_P = [33.45474, 126.56428]
end_P = (P[n][0], P[n][1])

# 전체 지도
location_point = (33.45503, 126.56120)
G = ox.graph_from_point(location_point, dist = 1400, dist_type = "bbox", network_type = "all")

# 출발지, 도착지 설정
orig = ox.nearest_nodes(G, now_P[1], now_P[0])
dest = ox.nearest_nodes(G, end_P[1], end_P[0])

# 최단거리 표시
route = ox.shortest_path(G, orig, dest, weight = "length")

# folium으로 html 파일 생성
marker = (P[n][2], P[n][3])
extra_lenth = 0

try:
    route_graph_map = ox.plot_route_folium(G, route, tiles = "OpenStreetMap")
    folium.Marker(now_P).add_to(route_graph_map)
    folium.Marker(marker).add_to(route_graph_map)

    if n == 2:
        extra_location=[[33.45504, 126.5624], [33.45503, 126.56179]]
        folium.PolyLine(extra_location).add_to(route_graph_map)
        extra_lenth = 0.061
    elif n == 7:
        extra_location=[[33.45743, 126.56317], [33.45828, 126.56312]]
        folium.PolyLine(extra_location).add_to(route_graph_map)
        extra_lenth = 0.091
    elif n == 11 or n == 33:
        extra_location=[[33.45764, 126.56473], [33.45782, 126.56490]]
        folium.PolyLine(extra_location).add_to(route_graph_map)
        extra_lenth = 0.025
    elif n == 12:
        extra_location=[[33.45777, 126.56117], [33.45825, 126.56116], [33.45827, 126.56048]]
        folium.PolyLine(extra_location).add_to(route_graph_map)
        extra_lenth = 0.115
    elif n == 20:
        extra_location=[[33.45156, 126.5592], [33.45157, 126.55885], [33.45193, 126.55879]]
        folium.PolyLine(extra_location).add_to(route_graph_map)
        extra_lenth = 0.063
    elif n == 21:
        extra_location=[[33.45560, 126.56385], [33.45602, 126.56386]]
        folium.PolyLine(extra_location).add_to(route_graph_map)
        extra_lenth = 0.038
    elif n == 23:
        extra_location=[[33.45315, 126.56251], [33.45314, 126.56192]]
        folium.PolyLine(extra_location).add_to(route_graph_map)
        extra_lenth = 0.056
    elif n == 25:
        extra_location=[[33.45743, 126.56118], [33.45737, 126.56117], [33.45738, 126.56039]]
        folium.PolyLine(extra_location).add_to(route_graph_map)
        extra_lenth = 0.09
    elif n == 31:
        extra_location=[[33.45743, 126.56318], [33.45847,126.56311]]
        folium.PolyLine(extra_location).add_to(route_graph_map)
        extra_lenth = 0.105
    elif n == 32:
        extra_location=[[33.45754, 126.56570], [33.45758, 126.56576], [33.45803, 126.56578]]
        folium.PolyLine(extra_location).add_to(route_graph_map)
        extra_lenth = 0.05
    elif n == 37:
        extra_location=[[33.45570, 126.56115], [33.45570, 126.55996]]
        folium.PolyLine(extra_location).add_to(route_graph_map)
        extra_lenth = 0.097
    elif n == 42:
        extra_location=[[33.45313, 126.56083], [33.45241, 126.56088]]
        folium.PolyLine(extra_location).add_to(route_graph_map)
        extra_lenth = 0.079
    elif n == 44:
        extra_location=[[33.45313, 126.56037], [33.45243, 126.56038]]
        folium.PolyLine(extra_location).add_to(route_graph_map)
        extra_lenth = 0.079
    elif n == 45:
        extra_location=[[33.45312, 126.55977], [33.45311, 126.55959], [33.45249, 126.55963]]
        folium.PolyLine(extra_location).add_to(route_graph_map)
        extra_lenth = 0.071
    elif n == 50:
        extra_location=[[33.45473, 126.56113], [33.45466, 126.56105], [33.45416, 126.55971]]
        folium.PolyLine(extra_location).add_to(route_graph_map)
        extra_lenth = 0.157
    elif n == 55:
        extra_location=[[33.45666, 126.56322], [33.45709, 126.56320], [33.45708, 126.56286]]
        folium.PolyLine(extra_location).add_to(route_graph_map)
        extra_lenth = 0.097
    elif n == 58:
        extra_location=[[33.45158, 126.55769], [33.45107, 126.55773]]
        folium.PolyLine(extra_location).add_to(route_graph_map)
        extra_lenth = 0.055
    elif n == 64:
        extra_location=[[33.45308, 126.55757], [33.45295, 126.55758], [33.45295, 126.55666]]
        folium.PolyLine(extra_location).add_to(route_graph_map)
        extra_lenth = 0.102

    route_graph_map.save("routh_with_folium.html")
except ValueError:
    route_graph_map = folium.Map((33.45503, 126.56120), zoom_start = 16)
    folium.Marker(now_P).add_to(route_graph_map)
    folium.Marker(marker).add_to(route_graph_map)

    if n == 5: 
        extra_location=[[33.45474, 126.56428], [33.45471, 126.56320], [33.45487, 126.56315]]
        folium.PolyLine(extra_location).add_to(route_graph_map)
        extra_lenth = 0.118
        route_graph_map.save("routh_with_folium.html")
    elif n == 10:
        extra_location=[[33.45497, 126.56512], [33.45530, 126.56512], [33.45533, 126.56597]]
        folium.PolyLine(extra_location).add_to(route_graph_map)
        extra_lenth = 0.134
        route_graph_map.save("routh_with_folium.html")
    elif n == 38:
        extra_location=[[33.45453, 126.56523], [33.45439, 126.56524], [33.45440, 126.56648], 
                        [33.45465, 126.56691], [33.45416, 126.56718]]
        folium.PolyLine(extra_location).add_to(route_graph_map)
        extra_lenth = 0.245
        route_graph_map.save("routh_with_folium.html")
    elif n == 65:
        extra_location=[[33.45474, 126.56428], [33.45472,126.56350]]
        folium.PolyLine(extra_location).add_to(route_graph_map)
        extra_lenth = 0.075
        route_graph_map.save("routh_with_folium.html")
    else:
        print("현재 위치 근처입니다.")

# 거리 출력
len = nx.shortest_path_length(G, orig, dest, weight = "length") / 1000
print(round(round(len, 3) + extra_lenth, 3), "km")