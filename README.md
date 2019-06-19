多节点服务中间件架构-Im-Cloud通讯平台 
==============
概述
=======
+ 基于`swoole`原生商业化即时推送im服务,不再进行业务处理，单独作为中间件使用，可弹性扩充节点增加性能处理,业务demo:http://github.com/brewlin/swoft-im(还没进行重构)
+ 高性能 水平扩容 分布式服务架构 接入服务治理
+ [`node-cloud`](./node-cloud) 作为中心服务节点 `grpc-server` 节点，对外可以进行TCP、Websocket 客户端进行`长连接`,可以对水平扩容至多个节点 并注册到服务中心 例如`consul`，每个cloud节点维护自己的客户端
+ [`node-job`](./node-job) 节点作为消费节点 消费队列数据 然后进行`grpc` 和cloud服务进行通讯 进行 `push` `push room` `broadcast`,作为节点中间件，消费`kafaka`，`rockermq。。。`之类
+ [`node-logic`](./node-logic) 节点 提供rest api接口，作为生产节点 和  grpc客户端,可写入队列作为生产者，也可以扩展自己的业务进行rpc直接调用center中心进行推送
+ `cloud,job,logic` 等节点都可以水平扩容
+ [`lib-grpc`](./lib-grpc) 定义grpc接口规范,使用`protobuf`构建
+ 服务间配置独立，使用composer进行依赖管理，进行composer组件化开发，`lib-core`,`lib-grpc` 作为公用基础包
+ [`lib-core`](./lib-core) 为核心基础组件，底层设计借鉴 `swoft`源码设计


架构图
=========
im-cloud 连接流程图
----
![](./resource/im-cloud-connect.png)
im-cloud 流程图
-----
![](./resource/im-cloud-process.png)

im-cloud 业务处理流程
-----
![](./resource/im-cloudt-task.png)

服务处理
------
todo

## 一、进度
### 1.完成了 `lib-core` 基础库的设计实现，借鉴swoft源码设计
### 2.完成了`grpc-server` 路由注册和 grpc-client 请求流程的demo
### 3.构建完成 protobuf 构建grpc 接口
### 4.kafaka consul to do...

## 二、组件依赖
### @lib-core (done)
### @lib-grpc (done)
### @node-cloud (todo)
### @node-job   (todo)
### @node-logic (todo)
### @lib-kafaka (todo)
### @lib-consul (todo)


