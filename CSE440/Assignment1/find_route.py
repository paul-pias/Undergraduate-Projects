from collections import defaultdict
import math
import sys

fileName = input("Enter file name : ")

source = input("Enter Origin_city: ")

destination = input("Enter Destination_city: ")


def Graph():
    dictionary = defaultdict(list)

    with open(fileName, 'r') as file:

        for line in file:
            (firstNode, secondNode, distance) = line.split()

            if firstNode == 'END' and secondNode == 'OF' and distance == 'INPUT':
                break
            else:

                dictionary[firstNode].append(secondNode)
                dictionary[secondNode].append(firstNode)

    return dictionary


#DFS starts here

graph = Graph()


def dfs_path(graph, source, dest):
    result = []
    DFS(graph, source, dest, [], result)
    return result


def DFS(graph, source, dest, edge, result):
    edge += [source]

    if source == dest:

        result.append(edge)

    elif (source != dest):

        for child in graph[source]:

            if child not in edge:
                DFS(graph, child, dest, edge[:], result)


dfsRoute = dfs_path(graph, source, destination)


#Dijkstra starts here

def graphForDijkstra():
    dictionary = defaultdict(dict)

    with open(fileName, 'r') as file:
        for line in file:
            (firstNode, secondNode, distance) = line.split()

            if firstNode == 'END' and secondNode == 'OF' and distance == 'INPUT':
                break
            else:
                dictionary[firstNode][secondNode] = int(distance)
                dictionary[secondNode][firstNode] = int(distance)

    return dictionary


graphForDijkstra = graphForDijkstra()


def dijkstra(graph, source, destination):
    unreachedNode = graph

    shortRoute = {}

    ancestor = {}

    infinite = math.inf

    route = []

    for node in unreachedNode:
        shortRoute[node] = infinite

    shortRoute[source] = 0

    while unreachedNode:
        lowNode = None

        for node in unreachedNode:

            if lowNode is None:

                lowNode = node

            elif shortRoute[node] < shortRoute[lowNode]:
                lowNode = node

        for childNode, edgeWeight in graph[lowNode].items():

            if edgeWeight + shortRoute[lowNode] < shortRoute[childNode]:
                shortRoute[childNode] = edgeWeight + shortRoute[lowNode]

                ancestor[childNode] = lowNode

        unreachedNode.pop(lowNode)

    if shortRoute[destination] != infinite:
        print("distance : " + str(shortRoute[destination]) + " km")

        currNode = destination

        while currNode is not None:
            try:
                route.insert(0, currNode)

                currNode = ancestor[currNode]

            except KeyError:
                break
        print("route : ")

        for edge in range(1, len(route)):
            print(route[edge - 1] + " to " + route[edge] + ", " + str(
                shortRoute[str(route[edge])] - shortRoute[str(route[edge - 1])]) + " km")


    else:
        print("distance : infinity")
        print("route: none")


dijkstra(graphForDijkstra, source, destination)
